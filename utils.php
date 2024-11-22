<?php

function showHelp() {
    echo "Usage: php theater-popularity.php -d=date\n";
    echo "Usage: php theater-popularity.php --date=date\n";
    echo "\nOptions:\n";
    echo "\t-d, --date\t      Date in format Y-m-d.\t\t[string]\n";
}

function validateDate($date) {
    $date = trim($date);
    $dateRegex = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/';
    if (!preg_match($dateRegex, $date)) {
        echo "Invalid date format. Please use Y-m-d format. \n e.g 2021-12-31\n";
        exit(1);
    }
}
