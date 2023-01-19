<?php

namespace App\Http\Controllers;
use App\Sale;
use App\User;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Reserve;
use App\SaleDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use item;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.create')->only(['create','store']);
        $this->middleware('can:sales.createSaleByReserve')->only(['create','storeSaleByReserve']);
        $this->middleware('can:sales.index')->only(['index']);
        $this->middleware('can:sales.show')->only(['show']);
        $this->middleware('can:change.status.sales')->only(['change_status']);
        $this->middleware('can:sales.pdf')->only(['pdf']);
        $this->middleware('can:sales.pdf_reserve')->only(['pdf_reserve']);
        $this->middleware('can:sales.print')->only(['print']);
    }

    public function index()
    {
        $sales = Sale::with('client')

        ->get();

        return view('admin.sale.index', compact('sales'));
    }
    public function create()
    {
        $clients = Client::get();
        $products = Product::where('status', 'ACTIVO')->get();
        return view('admin.sale.create', compact('clients', 'products'));
    }
    public function store(StoreRequest $request)
    {

        foreach ($request->product_id as $key => $product) {
         if($request->reserve_id[$key]=== "null"){
            $results[] = array("product_id"=>$request->product_id[$key],"quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
         }
         else{
            $results[] = array("product_id"=>$request->product_id[$key],"reserve_id"=>(int)$request->reserve_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
         }

       $quantityBeforeSale=Product::select('stock')
       ->where('id', $request->product_id[$key])->get()->toArray();
                foreach($quantityBeforeSale as $quantityBeforeSal)
                { $valorFromDataBase=$quantityBeforeSal['stock'];
                }
            Product::where('id', $request->product_id[$key])
            ->update(['stock' => $valorFromDataBase-$request->quantity[$key]]);

        }
        $sale = Sale::create([
            'client_id'=>$request->client_id,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'status'=>"VALIDO",
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Guayaquil'),
        ]);

        $sale->saleDetails()->createMany($results);

        foreach ($request->reserve_id as $key => $reserve) {
            if($reserve !== "null")
            {
                $resultsreserveid[] = array("reserve_id"=>$reserve);
                Reserve::where('id', $request->reserve_id[$key])
                ->update(['status' => 'ATENDIDO']);
            }
         }


        return redirect()->route('reserve.index');
       // dd($request);
        //$sale = Sale::create($request->all()+[
          //  'user_id'=>Auth::user()->id,
           // 'sale_date'=>Carbon::now('America/Guayaquil'),
       // ]);
        //foreach ($request->product_id as $key => $product) {
          //  $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
       // }
        //$sale->saleDetails()->createMany($results);
        //return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit', compact('sale'));
    }
    public function update(UpdateRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }
    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }
    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }
    public function pdf_reserve( Reserve $reserve)
    {
        $subtotal = 0 ;
        $saleDetails= SaleDetail::where('reserve_id', $reserve->id)->get();
        foreach ($saleDetails as $saleDetail) {

            $sale = Sale::where('id',$saleDetail->sale_id )
            ->with('saleDetails')
            ->with('user')
            ->get();
            }
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.reserve_pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale[0]->id.'.pdf');
    }
    public function print(Sale $sale){
        try {
            $subtotal = 0 ;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }
            $printer_name = "EPSON L210 Series";
           $connector = new WindowsPrintConnector($printer_name);
           $printer = new Printer($connector);

           $printer->text("$ 9,95\n");

           $printer->cut();
           $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALIDO') {
            $sale->update(['status'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $sale->update(['status'=>'VALIDO']);
            return redirect()->back();
        }
    }
    public function createSaleByReserve(Reserve $reserve)
    {

        $products=Product::all();

        $reserves = Reserve::whereBetween('created_at', [Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString()])
        ->with('client')
        ->where('client_id',$reserve->client_id)
        ->where('status','EN ESPERA')
        ->get();


//dd($reserves);
        return view('admin.sale.create_reserve_sale', compact('reserves','products','reserve'));
    }
}
