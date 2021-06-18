# LaraChat(Laravel+Vue+Pusher)
- 会員登録機能
- 1対多のリアルタイムチャット機能
![result](https://user-images.githubusercontent.com/75054606/122583427-2c2fcf00-d094-11eb-8c28-2dd9e332fbc5.gif)
<br>
※見づらいですが、３人います、、、、、、、


# Pusher
PusherとはWebサービスの1つで、WebSocketを使ってリアルタイムかつ両方向の通信機能をWebサイトやモバイルアプリに組み込むサービス.PusherのAPIはもともとシンプルだが、Laravel BroadcastingとLaravel Echoを組み合わせると極限までシンプルにできる．フロントエンドはVueを使って非同期で反映させる．

![pusher](https://user-images.githubusercontent.com/75054606/122578034-71e99900-d08e-11eb-99f8-74d4e0741573.png)

Pusher公式: https://pusher.com/

# 実行方法

```
// cloneする
$ git clone https://github.com/msd05keisuke/larachat.git

// プロジェクトへ移動
$ cd larachat

// Composer依存関係のインストール
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
 
// .envの作成
$ cp .env.example .env

// 環境変数の上書き
$ php artisan sail:install

// エイリアスの設定
$ alias sail='bash vendor/bin/sail'

// アプリケーションキーの設定
$ php artisan key:generate

// sailを立ち上げる
$ sail up -d

// migrateの実行
$ sail artisan migrate

// 停止する場合
$ sail down

```

