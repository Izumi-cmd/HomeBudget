<?php

namespace App\Services;

use App\Models\HomeBudget;

class HomeBudgetService
{

  public function __construct()
  {
  }

    public function createHomeBudgets(array $data): HomeBudget
    {
      $setParams = [
        'date' => $data['date'],
        'category_id' => $data['category'],
        'price' => $data['price'],
      ];
      return HomeBudget::create($setParams);
    }
}
