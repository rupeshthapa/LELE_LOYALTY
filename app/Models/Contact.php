<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'organization_name', 'email', 'phone_number', 'address', 'country', 'message', 'slug', 'is_read'];

    use HasFactory;
}
