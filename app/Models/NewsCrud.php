<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCrud extends Model
{
    use HasFactory;

    protected $table = 'crud';

    protected $fillable = [
        'title','description','image'
    ];
}