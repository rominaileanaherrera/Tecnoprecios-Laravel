<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected  $tabel = 'products';
  protected $primaryKey = 'id';
  protected $timestamp = true;
  protected $guardar = [];

}
