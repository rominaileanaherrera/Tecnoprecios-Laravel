<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

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
    
    public function addToCard(Request $request, $id )
    {
       $product = Product::find($id);
       $oldCard = Session::has('cart') ? Session::get('cart') : null;
       $cart =new Cart($oldCard);
       $cart->add($product, $product->id);

       $request->session()->put('cart',$cart);
    //    dd($request->session()->get('cart')); esto era para probar si funcionaba el boton de agregar al carrito
    $products = Product::randomize(3)->get();
    return view('home')->with ('products',$products);
    }

    public function productsCart(){
        if(!Session::has ('cart')){
            return view('productsCart',['products'=>null]);
        }
        $oldCard= Session::get ('cart');
        $cart = new Cart( $oldCard);
        return view('productsCart',['products'=>$cart->products,'totalprice'=>$cart->totalprice]);
    }

    public function removeFromCard(Request $request, $id )
    {
        $product = Product::find($id);
        $produ=[];
        $produ-> add($product, $product->id);
        $request->session()->forget('produ',$produ);

    
    return view('productsCart',['products'=>$cart->products,'totalprice'=>$cart->totalprice]);
    }
}
