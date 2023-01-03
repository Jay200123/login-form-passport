<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orderinfo';
	protected $primaryKey = 'orderinfo_id';
	public $timestamps = false;
    protected $fillable = ['customer_id','product_id','date_placed'];

    public function customers(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'orderline', 'product_id', 'quantity')->withPivot('quantity');
    }
}
