<?php

$departure = $_POST['departure'];
$destination = $_POST['destination'];
$date = $_POST['date'];


header("Location: display_results.php?departure=" . urlencode($departure) . "&destination=" . urlencode($destination) . "&date=" . urlencode($date));
exit();
?>
