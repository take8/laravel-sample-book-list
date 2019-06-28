# Laravel memo

## Environment

Laravel 5.7.\*

## How to create

バージョンを指定してプロジェクトを生成

```sh
composer create-project "laravel/laravel=5.7.*" bookapp
```

???: 学習動画と異なり、 application key が表示されなかった。バージョンアップで動作が変わったのかも。  
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
├── public         ... 全てのリクエストのエントリーポイント(index.php)や静的ファイル(css, js, 画像, faviconなど)
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

Laravel 内蔵の Web サーバで起動する

```sh
php artisan serve
> Laravel development server started: <http://127.0.0.1:8000>
```
