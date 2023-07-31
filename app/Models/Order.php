<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'phone',
        'type_order', 
        'IdUser' ,
        'code' ,
     ];


     public function users()
     {
      return $this->belongsTo('App\Models\User', 'user_id' , 'id');
     }
}
