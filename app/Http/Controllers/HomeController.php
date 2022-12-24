<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      //  $comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALIDO" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 25');
      //  $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDO" group by month(v.sale_date) order by month(v.sale_date) desc limit 50');
      $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALIDO" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
     $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDO" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALIDO" group by v.sale_date order by day(v.sale_date) asc limit 20');
        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALIDO") as totalventa');
        $productosvendidos=DB::select('SELECT p.code as code,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALIDO"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');


        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}
