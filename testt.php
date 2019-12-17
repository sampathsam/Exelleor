<?php

require "header.php";

echo 'Hello '. $_SESSION['email']. ' ';
?>
<a href="logout.php">logout</a>