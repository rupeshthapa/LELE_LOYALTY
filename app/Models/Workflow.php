<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable = ['title', 'description', 'image' , 'slug'];

    use HasFactory;
}
