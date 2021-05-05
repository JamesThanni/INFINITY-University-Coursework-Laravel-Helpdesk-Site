<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'Hardware';
    protected $primaryKey = 'serial_no';
}
