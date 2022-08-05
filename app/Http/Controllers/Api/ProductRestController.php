<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRestController extends Controller
{
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){
        $products = $this->product->all();

        return response()->json($products);
    }

    public function show($id){
        $product = $this->product->find($id);

        return response()->json($product);
    }

    public function save(Request $request){

        $data = $request->all();
        $product = $this->product->create($data);
        return response()->json($product);
    }
}
