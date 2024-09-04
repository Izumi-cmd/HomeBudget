<div>
   <button class="button edit-button" wire:click="openModal">編集</button>

    @if($isOpen)
        <div class="modal">
            <div class="modal-content">
                <h2 class="modal-title">編集</h2>
                <form wire:submit.prevent="updateHomeBudget" class="modal-form">
                  @csrf
                  {{-- 日付 --}}
                  <div class="modal-form-group">
                    <label for="date" class="modal-label">日付</label>
                    <input type="date" id="date" name="date" wire:model="date" class="modal-input">
                  </div>
                  @error('date')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                  {{-- カテゴリ --}}
                  <div class="modal-form-group">
                    <label for="category_id" class="modal-label">カテゴリ</label>
                    <select name="category_id" id="category_id" wire:model="category_id" class="modal-select">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('category_id')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                  {{-- 金額 --}}
                  <div class="modal-form-group">
                    <label for="price" class="modal-label">金額</label>
                    <input type="number" id="price" name="price" wire:model="price" class="modal-input">
                  </div>
                  @error('price')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                  <button type="submit" class="button modal-button">更新</button>
                  <button wire:click="closeModal" class="button modal-button">閉じる</button>
                </form>
            </div>
        </div>
    @endif
</div>
