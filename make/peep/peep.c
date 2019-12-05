#include <stdio.h>

char k3yw0rd[64] = "gkctf{ch3ck_7h3_l0c4710n_0f_v4r14bl3s!!}\0";

int main(){
  char local[16];
  int key = 0;

  fgets(local,32,stdin);
  printf("key is 0x%x\n", key);
  if (key == 0x1337)
    printf("flag is %s\n", k3yw0rd);
  return 0;
}
