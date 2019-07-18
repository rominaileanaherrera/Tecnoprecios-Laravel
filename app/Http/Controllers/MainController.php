<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
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
        $products = Product::where('tittle','LIKE','%'.$input.'%')->paginate(6);
        if(count($products) > 0)
        return view('serchproducs')->with("products", $products);
        else return view('productonoexistente')->withMessage('No tenemos ese producto disculpe!');
        

           
    }
    
    public function indextv()
    {
        $products = Product::where('category_id','=','2')->paginate(3);
        return view('serchproducs')->with("products", $products);
    }
    public function indextelefono()
    {
        $products = Product::where('category_id','=','1')->paginate(3);
        return view('serchproducs')->with("products", $products);
    }
    public function indexhorno()
    {
        $products = Product::where('category_id','=','3')->paginate(3);
        return view('serchproducs')->with("products", $products);
    }
    public function indexcamara()
    {
        $products = Product::where('category_id','=','4')->paginate(3);
        return view('serchproducs')->with("products", $products);
    }




    public function contactanos()
    {
        return view('contactanos');
    }
    public function about()
    {
        return view('about');
    }

}
