<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\Elastic;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($product->id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->addData($data['id'], json_encode($data));
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($product->id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->update($data['id'], json_encode($data));
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        (new Elastic('products'))->delete($product->id);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
