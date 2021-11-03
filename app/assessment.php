<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
    //Table Name
    protected $table = "assessments";

    //Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;
}
