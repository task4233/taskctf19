# Web Bad-Frontend-2 100

フロントエンドのvalidationでは不十分であることを再認識するための問題でした。これは, バックエンドを書くようになって強く感じたことです。結局のところリクエストは偽造し放題なので, いかにバックエンドで対策するが重要だと考えています。

ref: Why is client-side validation not enough?
https://stackoverflow.com/questions/3483514/why-is-client-side-validation-not-enough

[解法]
curlで直接リクエストを飛ばす:
curl -X POST http://35.233.246.182:3334/ -d "username=superuser_admin&password=password12345678" > out.html
-> out.htmlを見る