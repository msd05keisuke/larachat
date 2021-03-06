# LaraChat(Laravel+Vue+Pusher)
- 会員登録機能
- 1対多のリアルタイムチャット機能<br>
![result](https://user-images.githubusercontent.com/75054606/122583427-2c2fcf00-d094-11eb-8c28-2dd9e332fbc5.gif)
<br>
※見づらいですが、３人います、、、、、、、


# Pusher
PusherとはWebサービスの1つで、WebSocketを使ってリアルタイムかつ両方向の通信機能をWebサイトやモバイルアプリに組み込むサービス.PusherのAPIはもともとシンプルだが、Laravel BroadcastingとLaravel Echoを組み合わせると極限までシンプルにできる．フロントエンドはVueを使って非同期で反映させる．

![pusher](https://user-images.githubusercontent.com/75054606/122578034-71e99900-d08e-11eb-99f8-74d4e0741573.png)

Pusher公式: https://pusher.com/

# API

```
 {
  "user": {
    "id": 4,
    "name": "にほんだいひょう",
    "email": "abc@defg.hij",
    "email_verified_at": null,
    "created_at": "2021-06-18T15:10:49.000000Z",
    "updated_at": "2021-06-18T15:10:49.000000Z"
  },
  "message": {
    "id": 15,
    "user_id": 4,
    "message": "おはようございます！",
    "created_at": "2021-06-18T15:42:55.000000Z",
    "updated_at": "2021-06-18T15:42:55.000000Z"
  }
}


```


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

// .envの設定
BROADCAST_DRIVER=pusher　// 忘れがち

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

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

