<?php
session_destroy();
header("Location: src/page/login.php");
exit();