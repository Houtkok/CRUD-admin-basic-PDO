<?php
require_once 'database.php';
require_once 'user-repository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    $error = array();
    if (empty($fname) || empty($lname) || empty($gender) || empty($email) || empty($address) || empty($tel)) {
        $error[] = "All Field Require !!!";
    } else {
        $userRepository = new UserRepository($con);
        $success = $userRepository->create($fname, $lname, $gender, $email, $address, $tel);

        if ($success) {
            header("Location: admin_table.php");
            exit();
        } else {
            echo "Fail to insert!";
        }
    }
}
?>
