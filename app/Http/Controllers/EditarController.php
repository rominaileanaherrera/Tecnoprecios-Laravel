<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class EditarController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('editar')->with ('products',$products);
        
    }
    public function show($id){
        $product = Product::find($id);
        return view('show')->with('product',$product);
    }

    public function go($id){
        $product = Product::find($id);
        
        // return view('update')->with('product',$product);
        return view('update',[
            'product' => $product
        ]);

    }

    public function update( Request $request,$id){
      

        $reglas = [
            'image'=> 'image|max:1999|required',
            'tittle'=> 'required',
            'price'=> 'required',
            'category_id'=> 'required'
       ];

      $this->validate($request,$reglas);
       if($request->has('image')){
       $rutaArchivo = $request['image']->storepublicly('public/img');
       $nombreArchivo= basename($rutaArchivo);
   }
//    Product::update([
//        'tittle'=> $request['tittle'],
//        'price'=> $request['price'],
//        'id_class'=> $request['id_class'],
//        'image'=>$nombreArchivo
//        ]);


       $productoActualizado = Product::find($id);
       $productoActualizado->tittle = $request->input("tittle");
       $productoActualizado->price = $request->input("price");
       $productoActualizado->category_id = $request->input("category_id");
       $productoActualizado->image = 'public/img/'.$nombreArchivo;
       $productoActualizado->save();


       return redirect('editar');
       
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('editar');
        // nose porque no puedo poner el eitar blade como ruta 
    }

  
}
