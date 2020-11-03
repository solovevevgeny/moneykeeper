<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model{

    protected $hidden   = ['created_at', 'updated_at', 'start_amount'];
    protected $fillable = ['title','start_amount'];

}