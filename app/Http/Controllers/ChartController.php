<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChartController extends Controller
{
    public function cityChart()
    {
        //gets the city chart
        $customer = DB::table('customers')->groupBy('city')->orderBy('total')->pluck(DB::raw('count(city) as total'), 'city')->all();
        $labels = (array_keys($customer));

        $data = array_values($customer);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function productChart(){
        //gets the charts for product brands
        $product = DB::table('products')->groupBy('brand')->orderBy('total')->pluck(DB::raw('count(brand) as total'), 'brand')->all();
        $labels = (array_keys($product));

        $data = array_values($product);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function townChart(){
        $employee = DB::table('employees')->groupBy('town')->orderBy('total')->pluck(DB::raw('count(town) as total'), 'town')->all();
        $labels = (array_keys($employee));

        $data = array_values($employee);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}
