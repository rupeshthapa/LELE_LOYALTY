<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['title', 'description', 'icon', 'slug'];

    use HasFactory;
}
