<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define the table name if it differs from the default plural form
    protected $table = 'categories';

    // The primary key for the model (optional if using the default 'id')
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped (optional if you don't need created_at/updated_at)
    public $timestamps = true;

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'slug', // optional, useful for SEO-friendly URLs
        'description', // optional description of the category
        'parent_id', // for nested categories (if your site has sub-categories)
    ];

    // Define the relationship with products (one category has many products)
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Define a relationship for sub-categories (if you have a parent-child category structure)
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the reverse of the parent-child relationship (sub-categories)
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
