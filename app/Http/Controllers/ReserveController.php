<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Reserve\StoreRequest;
use App\Http\Requests\Reserve\UpdateRequest;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public function index()
    {
        $reserves = Reserve::get();
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

        Reserve::create($request->all()+[
            'reserve_date'=>Carbon::now('America/Guayaquil'),
        ]);
        return redirect()->route('reserve.index');
    }
    public function store_all(StoreRequest $request)
    {

        Reserve::create($request->all()+[
            'reserve_date'=>Carbon::now('America/Guayaquil'),
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
