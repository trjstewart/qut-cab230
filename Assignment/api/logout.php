<?php
  session_start();
  echo "Goodbye " . $_SESSION['username'];
  session_destroy();
 ?>
