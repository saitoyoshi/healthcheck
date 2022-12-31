<?php

$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqli接続エラー： ' . $mysqli->connect_error);
}
// id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
//     physical_condition INT NOT NULL,
//     mood_state INT NOT NULL,
//     back_pain INT NOT NULL,
//     eyestrain INT NOT NULL,
//     headache INT NOT NULL,
//     recording DATE NOT NULL,
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
$sql = <<< EOT
insert into healthrecords (physical_condition, mood_state, back_pain, eyestrain, headache, recording_date) values (50, 1, 0, -1, -2, '2022-12-31');
insert into healthrecords (physical_condition, mood_state, back_pain, eyestrain, headache, recording_date) values (80, 0, 1, -1, 0, '2022-12-30');
insert into healthrecords (physical_condition, mood_state, back_pain, eyestrain, headache, recording_date) values (60, 1, 0, 0, -2, '2022-12-28');
EOT;
$mysqli->multi_query($sql);
$mysqli->close();
