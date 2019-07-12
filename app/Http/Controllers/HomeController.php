<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::randomize(3)->get();
        
     
        
        return view('home')->with ('products',$products);
    }


    public function search(Request $request)
    {
        $input = $request->input('buscar');
        $products = Product::where('tittle','LIKE','%'.$input.'%')->paginate(2);
        if(count($products) > 0)
        return view('serchproducs')->with("products", $products);
        else return view('productonoexistente')->withMessage('No tenemos ese producto disculpe!');
        

           
    }
    
}
