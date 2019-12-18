# Misc Matryoshka 100
よく分からないファイルは$ fileを叩きましょうという話です。
以前, 友人が.zipファイルの拡張子を.docxにして, 「Wordで開けない」と相談してきた事例があったので, 今回取り上げました。

[解法の流れ]
$ file flag .zip
-> cpio展開(ググる)
-> $ file flag.tar.gz
-> bzip2展開(ググる)
-> $ file flag.tar.gz.out
-> ar展開(ググる)
-> flagとwhatAmIが得られる

# Misc Matryoshka2 100

hexdump等を使うと, AAAAAAのようなものが乱立しているので, base64を疑う(base64は余った時にA埋めをするので)

[解法]
base64 -d whatAmI > out
-> fileコマンドでそれが7zipだとわかる
-> brokenとflagが得られる



# Misc Matryoshka3 100

破損ファイルの修復は出来ると気持ちいいので入れました。

[解法]
fileコマンドが通らない
-> hexdump等で見ると最初の4バイトがXXXXになっていることがわかる
-> 適当に入れる(ここはエスパー色があるかも)
-> 50 4B 03 04に修正

![m1](https://pbs.twimg.com/media/ELCLvJ9UEAAUnml?format=jpg&name=medium)

-> unzipできない
-> 更に調べると末尾もXXXXになっている
-> 50 4b 05 06に修正

![m2](https://pbs.twimg.com/media/ELCLvhdUUAAhMQS?format=jpg&name=medium)

-> unzipできた！

ref: ZIP ファイルヘッダ  https://ja.wikipedia.org/wiki/ZIP_(%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%83%95%E3%82%A9%E3%83%BC%E3%83%9E%E3%83%83%E3%83%88)#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%83%98%E3%83%83%E3%83%80