<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //Because buyer has many transactions using eager loading. 
        // ->transactions->product
        //result of the transactions relationship is collection and we cannot obtain a product from a collection. throws an error
        $products = $buyer->transactions()->with('product')
            ->get()
            ->pluck('product'); //method used to get only product from a transaction. 

        return $this->showAll($products);
    }

}