<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table name (optional if your table name is the plural form of the model)
    protected $table = 'products';

    // The primary key for the model (optional if you are using the default 'id')
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // Define the fillable properties that can be mass-assigned
    protected $fillable = [
        'added_by', 
        'image_url', 
        'name', 
        'price', 
        'original_price', 
        'discount', 
        'rating', 
        'reviews_count', 
        'brand', 
        'model', 
        'processor', 
        'ram', 
        'storage', 
        'description', 
        'screen_size', 
        'resolution', 
        'ports', 
        'category_id',
        'stock_quantity',
        'sale_start_date',
        'sale_end_date',
        'additional_images',
        'features'
    ];

    // Define the relationships

    // Each product belongs to a user (the one who added it)
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Each product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // If you plan to have multiple images for each product, you could define a relationship for product images
    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }

    // // If you plan to have reviews for each product, define a relationship with a Review model
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }

    // Accessor for getting the sale price after discount (if needed)
    public function getSalePriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }
    
    // Mutator to handle the 'additional_images' JSON column correctly
    public function setAdditionalImagesAttribute($value)
    {
        $this->attributes['additional_images'] = json_encode($value);
    }

    // Mutator for 'features' (if it's a JSON field)
    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = json_encode($value);
    }

    // Accessor for 'additional_images' JSON column
    public function getAdditionalImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    // Accessor for 'features' JSON column
    public function getFeaturesAttribute($value)
    {
        return json_decode($value, true);
    }
}
