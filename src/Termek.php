<?php

namespace Petrik\Termekek;

use Illuminate\Database\Eloquent\Model;

class Termek extends Model{
    
    protected $table = 'termekek';
    public $timestamps = false;

    protected $guarded = ['id'];
    
}