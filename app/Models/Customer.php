<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $tables = 'customers';
    
    public $timestamps = false;

    protected $fillable = ['fname', 'lname', 'phone', 'address', 'town', 'city', 'customer_image', 'user_id'];

}
