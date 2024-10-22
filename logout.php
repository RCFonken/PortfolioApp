<?php
session_start();
session_unset();
session_destroy();

// Redirect to the homepage or any page you'd like
header("Location: /");
exit;
?>
