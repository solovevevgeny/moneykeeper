<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model{

     protected $hidden   = ['created_at', 'updated_at']; // hide from response
     protected $fillable = ['type','account_from_id', 'account_to_id', 'amount', 'comment'];

}
