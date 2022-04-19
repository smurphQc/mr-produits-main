<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOption;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];

    /**
     * Get the product's product_options.
     */
    public function product_options()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
