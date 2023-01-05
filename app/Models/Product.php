<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $table = 'products';

    public $timestamps = false;

    protected $fillable = ['brand','description','cost_price','sell_price','product_image'];

    public function stock(){
        return $this->hasOne('App\Models\Stock', 'product_id');
    }

    public function  orders(){
        return $this->belongsToMany(Order::class, 'orderline','orderinfo_id','product_id', 'quantity');
    }
}
