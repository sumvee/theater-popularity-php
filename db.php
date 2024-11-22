<?php
// get port from output of
//ddev describe
$conn = new mysqli("127.0.0.1", "db", "db", "db", 61386 );

return $conn;
