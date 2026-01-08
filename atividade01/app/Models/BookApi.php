<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookApi extends Model
{
    use HasFactory;

    protected $table = 'bookapi';

    protected $fillable = [
        'title',
        'author',
        'category',
        'publisher',
        'published_year'
    ];
}
