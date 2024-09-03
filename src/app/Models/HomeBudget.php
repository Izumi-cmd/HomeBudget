<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    /**
     * カテゴリーとのリレーション（1対1）
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * アクセサを定義
     * 日付をY-m-d形式にフォーマット
     */
    protected function getFormatDateAttribute()
    {
        return $this->date->format('Y-m-d');
    }

    /**
     * アクセサを定義
     * 金額を3桁区切りにフォーマット
     */
    protected function getFormatPriceAttribute()
    {
        return number_format($this->price);
    }
}
