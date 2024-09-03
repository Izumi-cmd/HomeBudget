<?php

namespace App\Services;

use App\Models\HomeBudget;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeBudgetService
{
    public function __construct(
    )
    {
    }

    /**
     * 支出を追加
     */
    public function createHomeBudgets(array $data): HomeBudget
    {
        $setParams = [
          'date' => $data['date'],
          'category_id' => $data['category'],
          'price' => $data['price'],
        ];
        return HomeBudget::create($setParams);
    }

    /**
     * 支出一覧をページネーションで取得
     */
    public function getAllForHomeBudgets(int $perPage = 10): LengthAwarePaginator
    {
        $homeBudgets = HomeBudget::with('category')->orderBy('date', 'desc')->paginate($perPage);
        return $homeBudgets;
    }

    /**
     * カテゴリー一覧を取得
     */
    public function getAllForCategories(): Collection
    {
        return Category::all();
    }
}
