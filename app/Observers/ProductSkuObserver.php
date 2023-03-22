<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductSku;
use App\Services\Elastic;

class ProductSkuObserver
{
    /**
     * Handle the ProductSkus "created" event.
     *
     * @param  \App\Models\ProductSku  $productSkus
     * @return void
     */
    public function created(ProductSku $productSkus)
    {
        //
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($productSkus->product_id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->update($data['id'], json_encode($data));
    }

    /**
     * Handle the ProductSkus "updated" event.
     *
     * @param  \App\Models\ProductSku  $productSkus
     * @return void
     */
    public function updated(ProductSku $productSkus)
    {
        //
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->whereId($productSkus->product_id)->first()->toArray();
        foreach ($data['properties'] as $property) {
            $property['search_value'] = "{$property['name']}:{$property['value']}";
        }
        $data['on_sale'] = (bool)$data['on_sale'];
        (new Elastic('products'))->update($data['id'], json_encode($data));
    }

    /**
     * Handle the ProductSkus "deleted" event.
     *
     * @param  \App\Models\ProductSku  $productSkus
     * @return void
     */
    public function deleted(ProductSku $productSkus)
    {
        //
        (new Elastic('products'))->delete($productSkus->product_id);
    }

    /**
     * Handle the ProductSkus "restored" event.
     *
     * @param  \App\Models\ProductSku  $productSkus
     * @return void
     */
    public function restored(ProductSku $productSkus)
    {
        //
    }

    /**
     * Handle the ProductSkus "force deleted" event.
     *
     * @param  \App\Models\ProductSku  $productSkus
     * @return void
     */
    public function forceDeleted(ProductSku $productSkus)
    {
        //
    }
}
