#include <stdio.h>
#include <string.h>

char buf[64];

void func(){
  char local[32];
  printf("buf address: 0x%x\n", &buf);
  fgets(buf,128,stdin);
  strcpy(buf,local);
}

int main(){
  func();
  return 0;
}
