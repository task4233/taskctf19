#include <stdio.h>

char k3y[32] = "gkctf{w3lc0m3_70_pwn!!!}";

void get_flag(){
  printf("flag is %s\n", k3y);
}

int main(){
  get_flag();
  return 0;
}
