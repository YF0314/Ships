# Ships
ブロックチェーンを利用したファイル保存システム

## 使い方
ファイルの中の{$SECRET}は適当な値を代入してください。また、URLなども適当に代入してください。

shipsファイルはウェブアプリです。
ships_apiファイルの中身はウェブAPIです。

ships.sqlはbodyのIDの1,2は同じファイルをアップロードし、3は違うファイルをアップロードしています。

## テストサイトについて

https://ships.app.xere.jp/ で、ここで公開してるファイルをホストしています。

# 追記
Githubアカウントのリポジトリ眺めてて、恥ずかしくなったので追記。


まず最初に、これはブロックチェーンとは呼べません。ブロックチェーンの定義が近年、曖昧になってきていると感じます。しかしそれらを考慮したとしても、これはブロックチェーンとは程遠いものです。私はブロックチェーンの”うつくしさ”に魅せられてノリで作ったのだと思いますが、似ても似つかない動作です。

データに時間軸を持たせること。そして、そのデータの中身を自分以外に知られないこと。
この2点が通常のデータベースのデータ構造と大きく違うところです。
また、私が開発するより前に、「コンテンツの中身は知られずに、所有権を主張できる」といった、サービスが既に存在しています。

※レンサバの契約を切ったので、今まで動作していた自前のAPIベースの認証サービスも動作していません。

過去の負の遺産と思っていますが、学習の形跡としてオープンにしておきます。
