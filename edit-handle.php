<?php
require_once 'database.php';
require_once 'user-repository.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $id > 0) {
    // Get user data
    $userRepository = new UserRepository($con);
    $user = $userRepository->getUserById($id);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Edit user data
    $updatedData = [
        'fname' => isset($_POST['fname']) ? $_POST['fname'] : '',
        'lname' => isset($_POST['lname']) ? $_POST['lname'] : '',
        'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
        'email' => isset($_POST['email']) ? $_POST['email'] : '',
        'address' => isset($_POST['address']) ? $_POST['address'] : '',
        'tel' => isset($_POST['tel']) ? $_POST['tel'] : '',
    ];

    $userRepository = new UserRepository($con);
    $user = $userRepository->getUserById($id);

    if ($user) {
        foreach ($updatedData as $key => $value) {
            $user[$key] = $value;
        }

        $success = $userRepository->update($user['id'],$user['fname'],$user['lname'],
                    $user['gender'],$user['email'],$user['address'],$user['tel']
        );

        if ($success) {
            header("Location: admin_table.php");
            exit();
        } else {
            echo "Update failed";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Form</title>
</head>
<body>
<form class="form-inline" action="" method="POST">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?=$user['fname']; ?>" >
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?=$user['lname']; ?>" >
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male" <?= ($user['gender'] === 'male') ? 'checked' : '' ?>>
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female" <?= ($user['gender'] === 'female') ? 'checked' : '' ?>>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$user['email']; ?>" >
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?=$user['address']; ?>" >
        </div>

        <div class="form-group">
            <label for="tel">Phone Number:</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="<?=$user['tel']; ?>" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>