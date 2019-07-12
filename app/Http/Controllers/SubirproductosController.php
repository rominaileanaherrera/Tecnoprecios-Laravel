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
            'id_class'=> 'required'

       ];
      $this->validate($request,$reglas);
       if($request->has('image')){
       $rutaArchivo = $request['image']->store('img','public');
       $nombreArchivo= basename($rutaArchivo);
   }
   Product::create([
       'tittle'=> $request['tittle'],
       'price'=> $request['price'],
       'id_class'=> $request['id_class'],
       'image'=>$nombreArchivo
       ]);

        
        // $request->file('image')->move(base_path().'/public/img/',$products->image);
       
        return redirect('subirproductos/new');
       
      
    }
}

