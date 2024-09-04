<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeBudget;
use App\Models\Category;
use Illuminate\View\View;


class Modal extends Component
{

    public $isOpen = false; /* モーダルの初期状態   */
    public $homeBudgetId; /* 取得したhomeBudgetのid */
    public $date;
    public $category_id;
    public $price;


    public function mount(int $homeBudgetId)
    {
        $this->homeBudgetId = $homeBudgetId;
        $this->loadHomeBudgetForId();
    }


    public function loadHomeBudgetForId()
    {
        $homeBudget = HomeBudget::findOrFail($this->homeBudgetId);
        $this->date = $homeBudget->format_date;
        $this->category_id = $homeBudget->category_id;
        $this->price = $homeBudget->price;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        $categories = Category::all();
        return view('livewire.modal', compact('categories'));
    }

    /**
     * 編集画面用のモーダルを開く
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * 編集画面用のモーダルを閉じる
     */
    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['date', 'category_id', 'price']);
    }

    public function updateHomeBudget()
    {
        $this->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        $homeBudget = HomeBudget::findOrFail($this->homeBudgetId);
        $homeBudget->update([
            'date' => $this->date,
            'category_id' => $this->category_id,
            'price' => $this->price,
        ]);

        $this->closeModal();
        session()->flash('message', '更新しました');

        $this->redirect(route('homebudget.index'));
    }
}
