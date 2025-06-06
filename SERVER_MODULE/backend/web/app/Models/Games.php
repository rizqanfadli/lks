<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $table = 'games';
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'img', 'file'];
}
