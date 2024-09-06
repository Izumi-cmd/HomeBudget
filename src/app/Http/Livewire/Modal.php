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
    public $modalType = 'edit'; /* defaultは編集画面 */
    public $title;


    /**
     * livewireの初期状態を定義
     * @param int $homeBudgetId
     * @return void
     */
    public function mount(int $homeBudgetId)
    {
        $this->homeBudgetId = $homeBudgetId;
        $this->loadHomeBudgetForId();
    }

    /**
     * idを指定してhomeBudgetを取得
     * @return void
     */
    public function loadHomeBudgetForId()
    {
        $homeBudget = HomeBudget::findOrFail($this->homeBudgetId);
        $this->date = $homeBudget->format_date;
        $this->category_id = $homeBudget->category_id;
        $this->price = $homeBudget->price;
    }


    /**
     * 使用するモーダルを定義。この場合はlivewire.modal.blade.phpを使用
     * @return \Illuminate\View\View
     */
    public function render(): View
    {

        return view('livewire.modal');
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

    /**
     * HomeBudgetの更新処理
     * @return void
     */
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
        session()->flash('success', '更新しました');

        $this->redirect(route('homebudget.index'));
    }

    /**
     * HomeBudgetの削除処理
     * @return void
     */
    public function deleteHomeBudget()
    {
        $homeBudget = HomeBudget::findOrFail($this->homeBudgetId);
        $homeBudget->delete();

        $this->closeModal();
        session()->flash('success', '削除しました');
        $this->redirect(route('homebudget.index'));
    }
}
