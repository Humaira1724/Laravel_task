<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders'; // Specify the correct table name

    protected $fillable =[
        'title',
        'description',
        'image'
    ];
}
