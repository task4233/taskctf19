#include <stdio.h>
#include <string.h>

char secret[32] = "gkctf{d0_u_kn0w_13375p33k?}\0";

void func(){
  printf("key address: 0x%x\n", &secret);
  char local[32];
  fgets(local,128,stdin);
  //strcpy(secret, local);
}

int main(){
  func();
  return 0;
}
