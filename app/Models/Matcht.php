<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matcht extends Model
{

    protected $table = 'Matcht';
    protected $fillable=['League_number','Club_number','date'];
}
