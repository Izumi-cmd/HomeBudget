<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>家計簿アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="header_title">家計簿アプリ</h1>
    </header>
    <main>
      {{-- メッセージ --}}
        @if (session('success'))
          <div class="alert alert-success">
            <p class="alert-message">{{ session('success') }}</p>
          </div>
        @endif
        <section class="container">
          <div class="balance">
            <h3 class="balance_title">支出一覧</h3>
            <table class="balance_table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>カテゴリ</th>
                        <th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homeBudgets as $homeBudget)
                      <tr>
                        <td>{{ $homeBudget->format_date }}</td>
                        <td>{{ $homeBudget->category->name }}</td>
                        <td>{{ $homeBudget->format_price }}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          <div class="add-balance">
            <h3 class="add-balance_title">支出の追加</h3>
            <form action="{{ route('homebudget.store') }}" method="POST" class="add-balance_form">
              @csrf
              {{-- 日付 --}}
              <div class="add-balance_form_group">
                <label for="date" class="add-balance_label">日付:</label>
                <input type="date" id="date" name="date" class="add-balance_input" required>
                @error('date')
                  <span class="add-balance_error">{{ $message }}</span>
                @enderror
              </div>
              {{-- カテゴリ --}}
              <div class="add-balance_form_group">
                <label for="category" class="add-balance_label">カテゴリ:</label>
                <select name="category" id="category" class="add-balance_select" required>
                  {{-- カテゴリを選択するためのセレクトボックスを追加 --}}
                  <option value="">カテゴリを選択</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category')
                  <span class="add-balance_error">{{ $message }}</span>
                @enderror
              </div>
              {{-- 金額 --}}
              <div class="add-balance_form_group">
                <label for="price" class="add-balance_label">金額:</label>
                <input type="number" id="price" name="price" class="add-balance_input" min="0" step="1" required placeholder="金額を入力">
                @error('price')
                  <span class="add-balance_error">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="button add-balance_button">追加</button>
            </form>
            </div>
        </section>
    </main>
</body>
</html>
