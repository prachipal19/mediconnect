<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $table = 'specialties';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name'];
}
