<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageLegal extends Model
{
    use HasFactory;

    protected $table = 'pages_legal';

    protected $fillable = [
        'slug',
        'title',
        'content',
    ];
}
