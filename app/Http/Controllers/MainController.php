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

        $this->mapCategories = [
            'tv' => 2,
            'telefono' => 1,
            'horno' => 3,
            'camara' => 4,
        ];
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
    
    public function home($category)
    {
        $id = $this->mapCategories[$category];
        $products = Product::where('category_id','=', $id)->paginate(3);
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

        \MercadoPago\SDK::setAccessToken('TEST-8787171978525568-072317-e2a6b95941b537a9d9fef9906cec9d26-48407809');
     

        // Crea un objeto de preferencia
        $preference = new \MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $items=[];

        foreach ($cart->products as $product){
            $item = new \MercadoPago\Item();
            $item->title = $product['product']['tittle'];
            $item->quantity = $product['qty'];
            $item->unit_price = $product['price'];
            $items[]= $item;
        }

        $preference->items = $items;
        $preference->save();

        return view('productsCart',[
            'products'=>$cart->products,
            'totalprice'=>$cart->totalprice,
            'init'=>$preference->init_point,
        ]);
    }

    public function removeFromCard($id )
    {

       $oldCard = Session::has('cart') ? Session::get('cart') : null;
       $cart =new Cart($oldCard);
       $cart->reduceBy1($id);

       Session::put('cart',$cart);
    return view('productsCart',['products'=>$cart->products,'totalprice'=>$cart->totalprice]);
    }

    public function removeFromCardAll($id )
    {

       $oldCard = Session::has('cart') ? Session::get('cart') : null;
       $cart =new Cart($oldCard);
       $cart->removeProduct($id);

       Session::put('cart',$cart);
    return view('productsCart',['products'=>$cart->products,'totalprice'=>$cart->totalprice]);
    }

    
    public function Profile()
    {
        return view('miPerfil');
    }
}
