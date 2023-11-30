<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['email'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
