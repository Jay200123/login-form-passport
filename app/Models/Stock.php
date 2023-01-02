<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $tables = 'stocks';

    public $timestamps = false;

    protected $fillable = ['product_id', 'quantity'];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
