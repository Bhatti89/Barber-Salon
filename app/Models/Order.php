<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    public function includes()
 {
 return $this->hasMany(includes::class);
 }
 public function client()
 {
    return $this->belongsTo(Clients::class, 'client_id');
    }
}
