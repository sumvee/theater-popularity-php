SELECT t.id, t.name, COUNT(tc.id) AS ticket_count
FROM theaters t
         JOIN showtimes s ON t.id = s.theater_id
         JOIN tickets tc ON s.id = tc.showtime_id
WHERE Date(s.showtime) = '2023-11-02'
GROUP BY t.id, t.name
ORDER BY ticket_count DESC LIMIT 1;


SELECT Date(s.showtime) AS date
FROM showtimes s
join tickets tc on s.id = tc.showtime_id
GROUP BY date;
