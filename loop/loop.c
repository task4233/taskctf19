#include <stdio.h>
#include <string.h>

char l00p_f14g[32] = "taskctf{XXXXXXXX}";

void g_f1g(){
  printf("flag is %s\n", l00p_f14g);
}

void vuln(){
  char buf[16];
  printf("buf address: 0x%x\n", &buf);
  fgets(buf, 128, stdin);
}

int main(){
  vuln();
  return 0;
}
