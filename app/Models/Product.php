<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $type
 * @property int|null $category_id
 * @property string $title
 * @property string $long_title
 * @property string $description
 * @property string $image
 * @property int $on_sale
 * @property float $rating
 * @property int $sold_count
 * @property int $review_count
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $category
 * @property string|null $category_path
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLongTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereReviewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSoldCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductProperty[] $properties
 * @property-read int|null $properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductSku[] $skus
 * @property-read int|null $skus_count
 */
class Product extends Model
{
    protected $casts = [
        'category' => Json::class
    ];

    public function skus()
    {
        return $this->hasMany(ProductSku::class, 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany(ProductProperty::class, 'product_id', 'id');
    }
}
