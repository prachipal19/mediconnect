<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['title'];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

