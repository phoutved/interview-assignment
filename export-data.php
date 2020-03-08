<?php

@$connection = new mysqli('localhost', 'web', 'web', 'cego_solution');

if ($connection->connect_error) {
    echo $connection->connect_error . "\n";

    exit;
}

$fileName = __DIR__ . '/users.cvs';

if (!file_exists($fileName)) {
    touch($fileName);
}

if (!is_writeable($fileName)) {
    echo "File is not writable\n";

    exit;
}

$file = fopen($fileName, 'a');

$keepRunning = 1;
while ($keepRunning) {

    $users = $connection->query('select * from users limit 10');

    if (!$users) {
        echo $connection->error . "\n";

        exit;
    }

    $keepRunning = $users->num_rows;


    while ($user = $users->fetch_object()) {
        if (fputcsv($file, [
            $user->id,
            $user->firstName,
            $user->lastName,
            $user->email,
        ])) {

            if (false === $connection->query("delete from users where id = '" . $connection->real_escape_string($user->id) . "'")) {
                echo $connection->error . "\n";

                exit;
            }

        } else {
            echo "Can't write to file\n";

            exit;
        }
    }


}

fclose($file);
