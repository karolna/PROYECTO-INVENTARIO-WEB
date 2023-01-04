<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Reserve\StoreRequest;
use App\Http\Requests\Reserve\UpdateRequest;
use Illuminate\Support\Carbon;

//use Carbon\Carbon;

class ReserveController extends Controller
{
    public function __construct()
    {
      // $this->middleware('auth');
       // $this->middleware('can:reserve.create')->only(['create','store']);
        $this->middleware('can:reserve.index')->only(['index']);
        $this->middleware('can:reserves.edit')->only(['edit','update']);
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
       $reserves=Reserve::whereBetween('created_at', [Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString()])->get();

      // dd(Carbon::now());

        return view('admin.reserve.index', compact('reserves'));
    }
    public function reserve_all()
    {
        $products = Product::where('status', 'ACTIVO')->get();
        return view('admin.reserve.createall', compact('products'));
   }
    public function create()
    {
        $products = Product::where('status', 'ACTIVO')->get();
        return view('admin.reserve.create', compact('products'));
    }

    public function store(StoreRequest $request)
    {
        $client = Client::firstWhere('dni', $request->dni);
        if (!$client) {
            $values = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'dni' => $request->dni,
            ];
            $client = Client::create($values);
        }
        Reserve::create([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'reserve_date' => Carbon::now('America/Guayaquil'),
            'client_id' => $client->id
        ]);
        return redirect()->route('index.index');
    }
    public function store_all(StoreRequest $request)
    {
        $client = Client::firstWhere('dni', $request->dni);
        if (!$client) {
            $values = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'dni' => $request->dni,
            ];
            $client = Client::create($values);
        }
        Reserve::create([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'reserve_date' => Carbon::now('America/Guayaquil'),
            'client_id' => $client->id
        ]);
        return redirect()->route('index.index');
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
        if ($reserve->status == 'VALIDO') {
            $reserve->update(['status'=>'VENCIDO']);
            return redirect()->back();
        } else {
            $reserve->update(['status'=>'VALIDO']);
            return redirect()->back();
        }
    }
}
