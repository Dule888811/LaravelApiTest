<?php


namespace App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

 class Quote extends Model
{
    protected $fillable = [
        'name','repeat'
    ];

 }
