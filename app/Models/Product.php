<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable =[ 'code','name',  'price', 'quantity', 'image', 'qr_code', 'status', 'created_by', 'updated_by'];



}
