<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductProperty
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereValue($value)
 * @mixin \Eloquent
 */
class ProductProperty extends Model
{
    public $timestamps = false;

}
