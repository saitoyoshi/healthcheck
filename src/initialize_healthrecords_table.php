<?php

$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqli接続エラー： ' . $mysqli->connect_error);
}

$mysqli->query('DROP TABLE IF EXISTS healthrecords');
$createTableSql = <<< EOT
CREATE TABLE healthrecords (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    physical_condition INT NOT NULL,
    mood_state INT NOT NULL,
    back_pain INT NOT NULL,
    eyestrain INT NOT NULL,
    headache INT NOT NULL,
    recording_date DATE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4
EOT;
$mysqli->query($createTableSql);
$mysqli->close();
