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

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('proructs.show', $product->id),
                ],
                [
                    'rel' => 'product.buyers',
                    'href' => route('proructs.buyers.index', $product->id),
                ], 
                [
                    'rel' => 'product.categories',
                    'href' => route('proructs.categories.index', $product->id),
                ], 
                [
                    'rel' => 'product.transactions',
                    'href' => route('proructs.transactions.index', $product->id),
                ],
                [
                    'rel' => 'seller',
                    'href' => route('sellers.show', $product->seller_id),
                ],
            ]
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

    public static function transformedAttribute($index) 
    {
        $attributes = [
             'id' => 'id',
            'name' => 'title',
            'description' => 'details',
            'quantity' => 'stock',
            'status' => 'status',
             'image' => 'picture',
             'seller_id' => 'seller',
            'created_at' => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deleteDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
