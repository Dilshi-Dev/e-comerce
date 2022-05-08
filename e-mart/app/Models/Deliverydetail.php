<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverydetail extends Model
{
    use HasFactory;

    protected $table='deliverydetails';
    protected $fillable=['trackingno','orderplacement','vehicleno','deliverycharge','receiversnumber'];
}
