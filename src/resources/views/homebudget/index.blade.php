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
                    <!-- 支出データのループ処理 -->
                </tbody>
            </table>
        </div>

        <div class="add-balance">
            <h3 class="add-balance_title">支出の追加</h3>
            <form action="/balances" method="POST" class="add-balance_form">
              <div class="add-balance_form_group">
                <label for="date" class="add-balance_label">日付:</label>
                <input type="date" id="date" name="date" class="add-balance_input">
              </div>
              <div class="add-balance_form_group">
                <label for="category" class="add-balance_label">カテゴリ:</label>
                <select name="category" id="category" class="add-balance_select"  ></select>
                {{-- カテゴリを選択するためのセレクトボックスを追加 --}}
              </div>
              <div class="add-balance_form_group">
                <label for="price" class="add-balance_label">金額:</label>
                <input type="text" id="price" name="price" class="add-balance_input">
              </div>
              <button type="submit" class="button add-balance_button">追加</button>
            </form>
            </div>
        </section>
    </main>
</body>
</html>
