<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    public $tables = 'stocks';

    public $timestamps = false;

    protected $fillable = ['product_id', 'quantity'];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
