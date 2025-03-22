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
}
