<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected  $table = 'products';
  protected $primaryKey = 'id';
  protected $timestamp = true;
  protected $guardar = [];
  protected $fillable = ['image','tittle', 'price', 'category_id'];

  public function Category(){
    return $this->belongsTo("App\Category", "category_id");
  }
 
  public function scopeRandomize($query, $limit = 3, $exclude = [])
  {
      $query = $query->whereRaw('RAND()< (SELECT ((?/COUNT(*))*10) FROM `products`)', [$limit])->orderByRaw('RAND()')->limit($limit);
      if (!empty($exclude)) {
           $query = $query->whereNotIn('id', $exclude);
           } return $query;
  }
}


