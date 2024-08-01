<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCrud extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $fillable = [
        'nama','link','image','status'
    ];
}
