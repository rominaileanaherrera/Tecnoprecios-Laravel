<?php

namespace App;

class Cart {
    public $products= null;
    public $totalitems= 0;
    public $totalprice =0;

    public function __construct($oldCard)
    {
        if ($oldCard){
            $this ->products = $oldCard->products;
            $this ->totalitems = $oldCard->totalitems;
            $this ->totalprice = $oldCard->totalprice;
            }
    }
    public function add($product, $id){
        $storedItem = ['qty' => 0, 'price' => $product->price, 'product'=> $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedItem= $this->products[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']= $product->price*$storedItem['qty'] ;
        $this->products[$id] =$storedItem;
        $this->totalitems++; 
        $this->totalprice+= $product->price; 

    }
    public function reduceBy1($id){
        $this->products[$id]['qty']--;
        $this->products[$id]['price'] -= $this->products[$id]['product']['price'];
        $this->totalitems--; 
        $this->totalprice-= $this->products[$id]['product']['price'];

        if($this->products[$id]['qty']<=0){
            unset($this->products[$id]);
        }
    }

    public function removeProduct($id){
        $this->totalitems-=$this->products[$id]['qty']; 
        $this->totalprice-= $this->products[$id]['price'];
        unset($this->products[$id]);
        
    }
}