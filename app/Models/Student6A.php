<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student6A extends Model
{
    // use HasFactory;
    
    protected $primaryKey = 'cnic'; // Set as primary key
 public $incrementing = false; // Non auto-incrementing
 /**
 * Inverse relationship: Get the Department that owns the Student.
 */
//  public function department()
//  {
//  return $this->belongsTo(Department::class);
//  }
public function cit()
 {
 return $this->belongsTo(city::class, 'city_id');
 }
}
