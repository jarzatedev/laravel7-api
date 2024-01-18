<?php

namespace App;

use App\Utils\CanBeRate;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $user
 * @property mixed $name
 */
class Product extends Model
{
    use CanBeRate;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'user_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Product $product) {
            $faker = Factory::create();
            $product->image_url = $faker->imageUrl();
            $product->user()->associate(auth()->user());
        });
    }


}
