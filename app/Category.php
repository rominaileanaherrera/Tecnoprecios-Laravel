<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected  $tabel = 'categories';
  protected $primaryKey = 'id';
  protected $timestamp = true;
  protected $guardar = [];
  protected $fillable = [ 'id' ];
  



public function Product(){
  return $this->hasMAny("App\Product","category_id");
}

}


