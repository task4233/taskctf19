#include <stdio.h>

char s3cr37[64] = "gkctf{1t's_f0rm@_str1ng_4tt4ck!!}\0";

void get_flag(){
  printf("flag is %s\n", s3cr37);
}

int main(){
  char local[128];
  fgets(local,128,stdin);
  printf(local);
  printf("secret address: 0x%x\n", &s3cr37);
  return 0;
}
