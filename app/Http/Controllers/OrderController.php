<?php

namespace App\Http\Controllers;

use App\Order;
use App\PurchaseDetails;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $orden_de_compras=Order::get();
        return view('admin.orden_de_compra.index', compact('orden_de_compras'));
    }

    public function create()
    {
        $clients =Client::get();
        return view('admin.orden_de_compra.create',compact('clients'));
    }

    public function store (StoreRequest $request)
    {
        $orden_de_compras=Order::create($request->all()+[
            'fecha'=>Carbon::now('America/Guayaquil'),
        ]);

            $series=$request->series;
            $precios=$request->precios;
            $marcas=$request->marcas;
            $numeraciones=$request->numeraciones;
            $labrados=$request->labrados;

            $count=0;
            while($count< count($series)){
                $detalles=new PurchaseDetails();
                $detalles->id_orden_de_compras=$orden_de_compras->id;
                $detalles->series=$series[$count];
                $detalles->precios=$precios[$count];
                $detalles->marcas=$marcas[$count];
                $detalles->numeraciones=$numeraciones[$count];
                $detalles->labrados=$labrados[$count];
                $detalles->save();
                $count=$count+1;
            }
        
        return redirect()->route('orden_de_compras.index');
    }
    public function show(Order $orden_de_compra)
    {      
        //$subtotal=0;
       // $PurchaseDetails=$orden_de_compra->PurchaseDetails;
        //foreach($PurchaseDetails as $PurchaseDetail)
        //{           $subtotal+= $PurchaseDetail->precios; }
        return view('admin.orden_de_compra.show', compact('orden_de_compra'));
    }

    
    public function edit(Order $orden_de_compra)
    {

        $clients =Client::get();

        return view('admin.orden_de_compra.show', compact('orden_de_compras', 'clients'));
    }

    
    public function update(UpdateRequest $request, Order $orden_de_compra)
    {
        $orden_de_compra->update($request->all());
        return redirect()->route('orden_de_compras.index');
    }

    public function destroy(Order $orden_de_compra)
    {
        $orden_de_compra->delete();
        return redirect()->route('orden_de_compras.index');

    }
}
