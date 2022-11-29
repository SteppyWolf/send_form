<?php

$servername = "127.0.0.1";
$username = "root";
$db_password = "";
$db = "Registration";

$mysqli = mysqli_connect($servername, $username, $db_password, $db);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} 
// else {
//     echo "DataBase " . "<b>" .  $db . "</b>" . " has already connected";
// }

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($mode === 'admin_panel') {
        $email = trim($_REQUEST['email']);
        $user = $mysqli->query("SELECT email, customers_password FROM customers WHERE email = '$email' limit 1");
        $user = mysqli_fetch_array($user, MYSQLI_ASSOC);


        if ($user) {
            if (password_verify(trim($_REQUEST['password']), $user['customers_password']) && $users_email = $user['email']) {


                $all_customers = $mysqli->query("SELECT * FROM customers");

                while ($result = mysqli_fetch_array($all_customers, MYSQLI_ASSOC)) {
                    $users[] = $result;
                }

                require 'users.html';
            } else {
                echo "Error";
                $failed_verifycation = 'true';
                require 'auth.html';
            }
        }

        exit;
    }

    $first_name = trim($_REQUEST['first_name']);
    $last_name = trim($_REQUEST['last_name']);
    $email = trim($_REQUEST['email']);
    $gender = $_REQUEST['gender'];
    $textarea = trim($_REQUEST['textarea']);
    $file = $_REQUEST['file'];
    $select = trim($_REQUEST['select']);
    $password = password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT);

    $user_created = $mysqli->query("INSERT INTO customers (firstname, lastname, email, gender, textarea, downloading_file, selected_list, customers_password) VALUES('$first_name', '$last_name', '$email', '$gender', '$textarea', '$file', '$select', '$password')");
}

if ($mode === 'auth') {
    require 'auth.html';
} else {
    require 'index.html';
}

exit;
