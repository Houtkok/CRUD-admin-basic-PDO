<?php
require_once 'database.php';
require_once 'user-repository.php';
$id = $_GET['id'];
$userRepository = new UserRepository($con);
$user = $userRepository->getUserById($id);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <li><?php echo"    {$user['id']}         "?></li>
    <li><?php echo"    {$user['fname']}      "?></li>
    <li><?php echo"    {$user['lname']}      "?></li>
    <li><?php echo"    {$user['gender']}     "?></li>
    <li><?php echo"    {$user['email']}      "?></li>
    <li><?php echo"    {$user['address']}    "?></li>
    <li><?php echo"    {$user['tel']}        "?></li>
    <button><a href="admin_table.php">Back</a> </button>
</body>
</html>