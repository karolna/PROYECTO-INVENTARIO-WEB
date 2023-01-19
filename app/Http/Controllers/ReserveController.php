<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Reserve\StoreRequest;
use App\Http\Requests\Reserve\UpdateRequest;
use Illuminate\Support\Carbon;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;

//use Carbon\Carbon;

class ReserveController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('can:reserve.create')->only(['create','store']);
        $this->middleware('can:reserve.index')->only(['index']);
        $this->middleware('can:reserves.edit')->only(['edit', 'update']);
        $this->middleware('can:reserves.show')->only(['show']);
        // $this->middleware('can:reserve.destroy')->only(['destroy']);
    }
    public function index()
    {
        //$reserves = Reserve::get();
        // $reserves = Reserve::where('status','VALIDO')->get();
        //$reserves =Reserve::where('status','VALIDO')->get();
        // $reserves=Reserve::whereDate('created_at', '<=', Carbon::now()->toDateTimeString())
        //->whereDate('created_at', '>=',Carbon::now()->subDay()->toDateTimeString())->get();
        // dd(Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString());
        // dd($reserves);
        $reserves = Reserve::whereBetween('created_at', [Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString()])
            ->with('client')
            ->get();
        // dd(Carbon::now());

        return view('admin.reserve.index', compact('reserves'));
    }
    public function reserve_all()
    {
        $clients=Client::get();
        $products = Product::where('status', 'ACTIVO')->get();

        $productosvendidos=DB::select('SELECT p.code as code, p.image,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALIDO"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 5');

        return view('admin.reserve.createall', compact('products','clients','productosvendidos'));
    }
    public function create()
    {
        $clients=Client::select("id", "name", "lastname","dni","phone")
        ->get();


        $products = Product::where('status', 'ACTIVO')->get();
        return view('admin.reserve.create', compact('products','clients'));
    }

    public function store(StoreRequest $request)
    {
        $client = Client::firstWhere('dni', $request->dni);
        if (!$client) {
            $values = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'dni' => $request->dni,
                'phone' => $request->phone,
            ];
            $client = Client::create($values);
        }
        Reserve::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'reserve_date' => Carbon::now('America/Guayaquil'),
            'client_id' => $client->id
        ]);

        return redirect()->route('reserve.index');
    }
    public function store_all(StoreRequest $request)
    {
        $client = Client::firstWhere('dni', $request->dni);
        if (!$client) {
            $values = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'dni' => $request->dni,
                'phone' => $request->phone,
            ];
            $client = Client::create($values);
        }
        Reserve::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'reserve_date' => Carbon::now('America/Guayaquil'),
            'client_id' => $client->id
        ]);
       // return redirect()->back();
      //  return redirect()->back()->with('success','Se ha generado exitosamente su reserva, caduca en 24 horas');
      return redirect()->back()->withInput()->with('success','Se ha generado exitosamente su reserva, caduca en 24 horas');
       // return redirect()->back()->with('success','Se ha generado exitosamente su reserva, caduca en 24 horas');
     //  return  $sessionManager->flash('mensaje', 'Este es el mensaje');
    }
    public function show(Reserve $reserve)
    {
        return view('admin.reserve.show', compact('reserve'));
    }
    public function edit(Reserve $reserve)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit', compact('sale'));
    }
    public function update(UpdateRequest $request, Reserve $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }
    public function destroy(Reserve $reserve)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }
    public function change_status(Reserve $reserve)
    {
        if ($reserve->status == 'EN ESPERA') {
            $reserve->update(['status' => 'ATENDIDO']);
            return redirect()->back();
        } else {
            $reserve->update(['status' => 'EN ESPERA']);
            return redirect()->back();
        }
    }

    public function get_quantity_reserve_by_id(Request $request){
        if ($request->ajax()) {
            $reserve = Reserve::whereBetween('created_at', [Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString()])
            ->where('id',$request->reserve_id)
            ->get();


             $products = Product::findOrFail($request->product_id);

            return response()->json($products,$reserve);

        }
    }
    public function get_client_by_dni(Request $request){
        if ($request->ajax()) {

             $client = Client::firstWhere('dni',$request->dni_client );
            return response()->json($client);

        }
    }



}
