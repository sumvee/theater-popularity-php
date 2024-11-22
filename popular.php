<?php

function getTopTheater($date,$conn){

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "
        SELECT t.id, t.name, COUNT(tc.id) AS ticket_count
        FROM theaters t
        JOIN showtimes s ON t.id = s.theater_id
        JOIN tickets tc ON s.id = tc.showtime_id
        WHERE DATE(s.showtime) = ?
        GROUP BY t.id, t.name
        ORDER BY ticket_count DESC
        LIMIT 1;
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No data found for date: $date\n";
        $datesQuery = "
            SELECT DATE(s.showtime) AS date
            FROM showtimes s
            GROUP BY date
        ";
        $datesResult = $conn->query($datesQuery);
        echo "Available dates are:\n";
        while ($row = $datesResult->fetch_assoc()) {
            echo $row['date'] . "\n";
        }
        $conn->close();
        exit(1);
    }

    $topTheater = $result->fetch_assoc();
    echo "Top Theater: " . $topTheater['name'] . " with " . $topTheater['ticket_count'] . " tickets\n";

    $conn->close();
}
