<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index(Request $request)
    {


        if (isset($request->brand)) {
         $brand = $request->brand;

            $products = DB::table('products')->whereIN('cat_id', explode( ",",$brand));


              response()->json($products);
            return view('products', compact('products'));

        }
        else {

            $products = DB::table('products')->get();

            return view('product', compact('products'));
        }

    }


}
