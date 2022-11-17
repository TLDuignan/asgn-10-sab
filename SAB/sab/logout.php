<?php
require_once('private/initialize.php');

// Log out the User
$session->logout();

redirect_to(url_for('index.php'));

?>
