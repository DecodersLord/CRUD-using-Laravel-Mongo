<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobby extends Model
{
    //
    public $name;

    public function __construct($name){
      $this->name = $name;
    }
}
