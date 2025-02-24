<?php

namespace App\Models;

use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
   



    protected $fillable = ['title', 'description', 'image'];
    // $cleanDescription = Purify::clean($request->description);cd app1
}
