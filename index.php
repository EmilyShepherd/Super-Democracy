<?php

include 'database.php';

$elections = $db->query('SELECT * FROM election WHERE start < NOW() AND NOW() < end');

while ($election = $elections->fetch_assoc())
{
    var_dump($election);
}