<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table='_items';
    protected $fillable=['stockname','quantity','price','suppliername','itemimg'];
    use HasFactory;

}
