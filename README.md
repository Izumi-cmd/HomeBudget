# Laravel_template

家計簿管理アプリ

## 概要

このアプリは、ユーザーが家計を管理するためのシンプルで使いやすいツールです。
収入や支出を記録し、視覚的に分析することができます。

## ユースケース

サンプルサイトのため支出の追加と更新、削除機能のみの簡単な実装となっております。

- livewire を使用して編集と削除機能はモーダルで実装してます。

## 環境構築

1. ローカルにクローンする

```
git clone git@github.com:Izumi-cmd/HomeBudget.git
```

2. 初期設定をする。

```
# .envファイルを作成する。
cp .env.example .env

# アプリケーションキーを生成
php artisan key:generate
```

3. 依存関係をインストールします。

```
# bash
composer install
```

4. マイグレーションを実行

```
# bash
php artisan migrate
```

5. ファクトリの実行

```
# bash
php artisan db:seed
```

6. ローカル環境へアクセス
   http://localhost
