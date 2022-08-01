<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;

class IndexController extends Controller
{

    public function reports_day(){
        $products = Product::all();
        return view('admin.index.index', compact('products'));
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
