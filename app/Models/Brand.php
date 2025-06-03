<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'image_path', 'added_by'];

    // Relationship with User (who added the brand)
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Define the relationship to the User model (the admin who added it)
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
