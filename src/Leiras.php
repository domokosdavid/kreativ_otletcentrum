<?php

namespace Petrik\Termekek;

use Illuminate\Database\Eloquent\Model;

class Leiras extends Model{
    
    protected $table = 'termek_leiras';
    public $timestamps = false;

    protected $guarded = ['id'];
    
}