<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => (int)$product->id,
            'title' => (string)$product->name,
            'details' => (string)$product->description,
            'stock' => (int)$product->quantity,
            'status' => (string)$product->status,
            'picture' => url("img/{$product->image}"),
            'seller' => (int)$product->seller_id,
            'creationDate'=> (string)$product->created_at,
            'lastChange'=> (string)$product->updated_at,
            'deleteDate'=> isset($product->deleted_at) ? (string)$product->deleted_at : null,
        ];
    }

    public static function originalAttribute($index) 
    {
        $attributes = [
            'id' => 'id',
            'title'=> 'name',
            'details'=> 'description',
            'stock'=> 'quantity',
            'status'=> 'status',
            'picture' => 'image',
            'seller' => 'seller_id',
            'creationDate'=> 'created_at',
            'lastChange'=> 'updated_at',
            'deleteDate'=> 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
