<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class SubirproductosController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('subirproductos')->with ('products',$products);
    }



    public function create(Request $request)
    {
    
        $products = Product::all();
        $categories = \App\Category::all();
        
        return view('subirproductos')->with ('products',$products)->with ('categories',$categories);
        
    }


    public function store(Request $request)
    {
        $reglas = [
            'image'=> 'image|max:1999|required',
            'tittle'=> 'required',
            'price'=> 'required',
            'category_id'=> 'required'

       ];
      $this->validate($request,$reglas);
       if($request->has('image')){
       $rutaArchivo = $request['image']->store('img','public');
       $nombreArchivo= basename($rutaArchivo);
   }
   Product::create([
       'tittle'=> $request['tittle'],
       'price'=> $request['price'],
       'category_id'=> $request['category_id'],
       'image'=>$nombreArchivo
       ]);

      
        
        
       
        return redirect('subirproductos/new');
       
      
    }
}

