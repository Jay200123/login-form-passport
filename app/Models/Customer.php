<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $tables = 'customers';

    public $primaryKey = 'id';
    
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = ['fname', 'lname', 'phone', 'address', 'town', 'city', 'customer_image', 'user_id'];

    public function orders(){
        return $this->belongsToMany('App\Models\Order', 'customer_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
