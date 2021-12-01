<?php

namespace Petrik\Termekek;

use Illuminate\Database\Eloquent\Model;

class Atvet extends Model{
    
    protected $table = 'atvetel';
    public $timestamps = false;

    protected $guarded = ['id'];
    
}