<?php
session_start();
session_destroy();
header("Location:./ftont/login.html");
exit();
