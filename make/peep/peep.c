#include <stdio.h>

char k3yw0rd[64] = "taskctf{XXXXXXXX}\0";

int main(){
  char local[16];
  int key = 0;

  fgets(local,32,stdin);
  printf("key is 0x%x\n", key);
  puts("");
  if (key == 0x1337) {
    printf("flag is %s\n", k3yw0rd);
    puts("");
  }
  return 0;
}
