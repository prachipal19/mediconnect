<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['email','telephone','nic','password','name'];

    public function specialty()
    {
        return $this->belongsTo(Speciality::class);
    }
  
    public function schedules()
{
    return $this->hasMany(Schedule::class);
}
 
}
