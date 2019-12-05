#include <stdio.h>

char s3cr37[32] = "taskctf{XXXXXXXX}\0";
int key = 0x12345678;

void get_flag(){
  printf("flag is %s\n", s3cr37);
}

int main(){
  char local[128];
  fgets(local,128,stdin);
  printf(local);
  printf("key address: 0x%x\n", &key);
  printf("key        : 0x%x\n", key);
  if(key==0x334)
    get_flag();
  return 0;
}
