<?php
setcookie('status', 'success', time()-300, '/');

header('Location: login.php');
die();