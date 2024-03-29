# Laravel memo

## Environment

Laravel 5.7.\*

## How to create

バージョンを指定してプロジェクトを生成

```sh
composer create-project "laravel/laravel=5.7.*" bookapp
```

???: 学習動画と異なり、 application key が表示されなかった。バージョンアップで動作が変わったのかも。  
--> `.env`に書いてあるものがそれっぽい    
参考: 最後の方に以下のようなコマンド実行が書いてあった。

```sh
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
> @php artisan key:generate --ansi
```

```sh
# バージョンを確認
php artisan -V
> Laravel Framework 5.7.28
```

## Laravel の基本構造

https://qiita.com/shosho/items/93cbff79376c41c3a30b#channelsphp

```sh
.
├── app            ... アプリケーション本体
├── artisan
├── bootstrap      ... デザインテンプレート
├── composer.json
├── composer.lock
├── config         ... 各種設定ファイル
├── database       ... データベース関連のファイル(マイグレーション、シード)
├── package.json
├── phpunit.xml
├── public         ... 全てのリクエストのエントリーポイント(index.php), 静的ファイル(css, js, 画像, faviconなど), レイアウトファイル
├── readme.md
├── resources      ... ビューテンプレート、多言語対応時のラベルの文字列など
├── routes         ... ルーティング
├── server.php
├── storage        ... データの保存場所
├── tests          ... ユニットテストコード
├── vendor         ... 外部ライブラリ
└── webpack.mix.js
```

## 起動

### MySQL(Docker)

```sh
cd {PROJECT_ROOT}
docker-compose up -d
```

停止するときは

```sh
docker-compose down
```

#### 参考: コマンドラインで MySQL に接続

```sh
mysql -h 127.0.0.1 -u homestead -p
> Enter password:
```

パスワードは`.env`の`DB_PASSWORD`を参照。

### Laravel 内蔵の Web サーバを起動

```sh
php artisan serve
> Laravel development server started: <http://127.0.0.1:8000>
```

## マイグレーション

### テーブル作成

```sh
php artisan make:migration create_books_table --create=books
```

### マイグレーション実行

```sh
php artisan migrate
```

## モデルの追加

```sh
php artisan make:model Book
```

## blade メモ

### ディレクティブ

@if
@endif

@extends ... extends で指定したファイルを継承する。extends された側で@yield したキーワードを@section で置換できる
@section

@include ... 部分テンプレートとして読み込む

## ログイン認証機能の追加

ありがちな機能なので、標準で簡単に組み込めるようになっている。

```sh
php artisan make:auth

# 参考: viewだけ追加する場合
php artisan make:auth --views
```

`users`, `password_resets`テーブルはプロジェクト生成時にデフォルトでマイグレーションされている。
