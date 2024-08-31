<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBudget extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'category_id',
        'price',
    ];

    protected $casts = [
        'date' => 'date',
        'category_id' => 'integer',
        'price' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
