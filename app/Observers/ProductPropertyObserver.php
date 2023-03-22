<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductProperty;
use App\Services\Elastic;

class ProductPropertyObserver
{
    /**
     * Handle the ProductProperties "created" event.
     *
     * @param  \App\Models\ProductProperty  $ProductProperties
     * @return void
     */
    public function created(ProductProperty $ProductProperties)
    {
        //
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($ProductProperties->product_id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->update($data['id'], json_encode($data));
    }

    /**
     * Handle the ProductProperties "updated" event.
     *
     * @param  \App\Models\ProductProperty  $ProductProperties
     * @return void
     */
    public function updated(ProductProperty $ProductProperties)
    {
        //
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($ProductProperties->product_id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->update($data['id'], json_encode($data));
    }

    /**
     * Handle the ProductProperties "deleted" event.
     *
     * @param  \App\Models\ProductProperty  $ProductProperties
     * @return void
     */
    public function deleted(ProductProperty $ProductProperties)
    {
        //
        (new Elastic('products'))->delete($ProductProperties->product_id);
    }

    /**
     * Handle the ProductProperties "restored" event.
     *
     * @param  \App\Models\ProductProperty  $ProductProperties
     * @return void
     */
    public function restored(ProductProperty $ProductProperties)
    {
        //
    }

    /**
     * Handle the ProductProperties "force deleted" event.
     *
     * @param  \App\Models\ProductProperty  $ProductProperties
     * @return void
     */
    public function forceDeleted(ProductProperty $ProductProperties)
    {
        //
    }
}
