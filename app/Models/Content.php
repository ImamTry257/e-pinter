<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content_type',
        'title',
        'slug',
        'is_headline',
        'descriptions',
        'images',
        'status',
        'count_readed',
        'created_by'
    ];
}
