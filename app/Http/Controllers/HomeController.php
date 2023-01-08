<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $fechaActual=Carbon::now('America/Guayaquil')->toDateTimeString();
        $fechaAñoAnterior=Carbon::now('America/Guayaquil')->subYear()->toDateTimeString();
        $comprasmes=DB::table('purchases')
            ->select(DB::raw('sum(total) as totalmes'), DB::raw('month(purchase_date) as mes'),DB::raw('year(purchase_date) as anio'))
            ->groupBy('mes','anio')
            ->whereBetween('purchase_date',[$fechaAñoAnterior,$fechaActual])
            ->limit(25)
            ->get();

            $ventasmes=DB::table('sales')
            ->select(DB::raw('sum(total) as totalmes'), DB::raw('month(sale_date) as mes'),DB::raw('year(sale_date) as anio'))
            ->groupBy('mes','anio')
            ->whereBetween('sale_date',[$fechaAñoAnterior,$fechaActual])
            ->limit(25)
            ->get();
       // $reserves = Reserve::whereBetween('created_at', [Carbon::now()->subDay()->toDateTimeString(), Carbon::now()->toDateTimeString()])
       // $comprasmes=DB::select('SELECT c.purchase_date as mes, sum(c.total) as totalmes from purchases c where c.status="VALIDO"  and where  DateDiff(month, $fechaAñoAnterior, $fechaActual) ) group by c.purchase_date order by c.purchase_date desc limit 25');
       // $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDO" group by month(v.sale_date) order by month(v.sale_date) desc limit 50');
     // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALIDO" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
     //$ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDO" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALIDO" group by v.sale_date order by day(v.sale_date) asc limit 20');
        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALIDO") as totalventa');
        $productosvendidos=DB::select('SELECT p.code as code,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALIDO"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');

        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
        foreach ($comprasmes as $compra) {
            $fecha=$compra->anio.'-'.$compra->mes.'-1';
            $compra->mes=strftime('%B',strtotime($fecha));
        }
        foreach ($ventasmes as $venta) {
            $fecha=$venta->anio.'-'.$venta->mes.'-1';
            $venta->mes=strftime('%B',strtotime($fecha));
        }





        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}
