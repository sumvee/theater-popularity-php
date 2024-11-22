#!/usr/bin/env php
<?php

require_once "utils.php";
$conn = require_once "db.php";
require_once "popular.php";

$options = getopt("d::", ["date::"]);

if (!isset($options['d']) && !isset($options['date'])) {
    showHelp();
    exit(0);
}

$date = $options['d'] ?? $options['date'];
validateDate($date);

getTopTheater($date, $conn);

?>
