<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected  $tabel = 'categories';
  protected $primaryKey = 'id';
  protected $timestamp = true;
  protected $guardar = [];

}



