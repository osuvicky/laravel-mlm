<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'mobile',
        'country',
        'state',
        'city',
        'address',
        'gender',
        'date_of_birth',
        'image',    
    ];

    public function bio()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
