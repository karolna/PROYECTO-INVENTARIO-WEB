<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\PurchaseDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;


class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:purchases.create')->only(['create','store']);
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.show')->only(['show']);
        $this->middleware('can:purchases.edit')->only(['edit','update']);
        $this->middleware('can:change.status.purchases')->only(['change_status']);
        $this->middleware('can:purchases.pdf')->only(['pdf']);
        $this->middleware('can:upload.purchases')->only(['upload']);
    }

    public function index()
    {
        $purchases = Purchase::where('deleted_at', NULL)
        ->with('provider')
            ->with('purchasedetails')
            ->get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('deleted_at', NULL)

        ->get();
        return view('admin.purchase.create', compact('providers','products'));
    }
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create([
            'provider_id'=>$request->provider_id,
            'tax'=> $request->tax,
            'total'=> $request->total,
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Guayaquil'),
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
            $quantityBeforePurchase=Product::select('stock')
            ->where('id', $request->product_id[$key])->get()->toArray();
                     foreach($quantityBeforePurchase as $quantityBeforePurchas)
                     { $valorFromDataBase=$quantityBeforePurchas['stock'];
                     }
                 Product::where('id', $request->product_id[$key])
                 ->update(['stock' => $valorFromDataBase+$request->quantity[$key]]);
        }

        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }
    public function edit(Purchase $purchase)
    {
         // $providers = Provider::get();
         // return view('admin.purchase.edit', compact('purchase'));
         // $provider = Provider::get();
         //$purchaseDetails = PurchaseDetails::get();
          //  $purchase = Purchase::where('deleted_at', NULL)->get();
          dd($purchase);
          $purchase = Purchase::where('deleted_at', NULL)
          ->with('provider')
              ->with('purchasedetails')
              ->get();

           // return view('admin.purchase.edit', compact( 'purchase','purchaseDetails','provider'));

    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
         $purchase->update($request->all());
         return redirect()->route('purchases.index');
    }
    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }

    public function upload(Request $reques, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {

        if ($purchase->status == 'VALIDO') {
            $purchase->update(['status'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $purchase->update(['status'=>'VALIDO']);
            return redirect()->back();
        }
    }
    public function change_delete_at(Purchase $purchase)
    {

            $purchase->update(['deleted_at'=>Carbon::now('America/Guayaquil')]);

            return redirect()->back();
    }
}
