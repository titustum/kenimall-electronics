<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
        'description',
        'model',
        'price',
        'sale_price',
        'stock',
        'is_featured',
        'category_id',
        'brand_id',
        'condition',
        'specifications',
        'features',
        'color',
        'image_path',
        'slug',
        'added_by'
    ];

    protected $casts = [
        'specifications' => 'array',
        'features' => 'array',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relationship with User (who added the product)
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Relationship with Product Images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    // // Mutator for the slug
    // public function setSlugAttribute($value)
    // {
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    // Method to calculate the average rating of the product
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}