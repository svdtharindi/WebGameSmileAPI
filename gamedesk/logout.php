<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: login.php');
die;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>log out</title>
</head>

<body>
</body>
</html>