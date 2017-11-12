<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Student extends Eloquent
{
    //
    protected $connection='mongodb';
    protected $collection='resumes';

    public $name;
    public $email;
    public $address;
    public $dob;

    // public function __construct($name, $email, $dob, $address)
    // {
    //     $this->name = $name;
    //     $this->email = $email;
    //     $this->dob = $dob;
    //     $this->address = $address;
    //
    // }
}
