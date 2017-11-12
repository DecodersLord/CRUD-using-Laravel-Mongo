<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    //
    public $name;

    public $description;

    public $start_date;

    public $end_date;

    public $team_size;

    public $guide;


    public function __construct($name,$description,$start_date,$end_date,$team_size,$guide){
      $this->name = $name;
      $this->description = $description;
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->team_size = $team_size;
      $this->guide = $guide;
    }
}
