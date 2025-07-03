<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';//ust match your table name
    protected $fillable = ['house_no', 'road_no', 'Phone_no', 'amount']; // ✅ Mass-assignable fields
}
