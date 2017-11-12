<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    //
    public $name;

    public $institute;

    public $start_year;

    public $end_year;

    public $score;



    public function __construct($name,$institute,$start_year,$end_year,$score){
      $this->name = $name;
      $this->institute = $institute;
      $this->start_year = $start_year;
      $this->end_year = $end_year;
      $this->score = $score;

    }
}
