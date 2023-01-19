<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function reports_day(){
        $products = Product::all();
        $productosvendidos=DB::select('SELECT p.code as code, p.image,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALIDO"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 6');

        return view('admin.index.index', compact('products','productosvendidos'));
    }
    public function reencauchadas(){
        $products = Product::where('category_id', 1)->get();
        return view('admin.index.reencauchadas', compact('products'));
    }
    public function nuevas(){
        $products = Product::where('category_id', 2)->get();
        return view('admin.index.nuevas', compact('products'));
    }
    public function defensas(){
        $products = Product::where('category_id', 4)->get();
        return view('admin.index.defensas', compact('products'));
    }
    public function tubos(){
        $products = Product::where('category_id', 3)->get();
        return view('admin.index.tubos', compact('products'));
    }
    public function aros(){
        $products = Product::where('category_id', 6)->get();
        return view('admin.index.aros', compact('products'));
    }


}
