<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webuser extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;

    protected $table = 'webusers';
    protected $primaryKey = 'email';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'user_type',
    ];

    // Implementing methods required by the Authenticatable interface
    public function getAuthIdentifierName()
    {
        return 'email'; // Replace 'email' with the actual column name for the user identifier
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Add any other methods specific to your Webuser model

    public function getEmailAttribute()
    {
        return $this->attributes['email'];
    }
}
