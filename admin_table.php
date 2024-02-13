<?php
require_once 'database.php';
require_once 'user-repository.php';
$userRepository = new UserRepository($con);
$userData = $userRepository->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
    <style>
        div{
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        a{
            display: inline;
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: white;
            text-decoration: none;
        }
    </style>
    <script>
    function confirmDelete(useID){
        var confirmDelete = confirm("Are you sure you want to delete");
        if(confirmDelete){
            window.location.href= 'delete.php?id=' +useID;
        }
    }
    </script>
</head>
<body>
    <button type="button" class="btn btn-success"><a href="index_database_crud.php">Create</a></button>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // $userData = $userRepository->read();
                foreach ($userData as $user) {
                    echo "<tr>";
                    echo "<td>  {$user['id']}         </td>";
                    echo "<td>  {$user['fname']}      </td>";
                    echo "<td>  {$user['lname']}      </td>";
                    echo "<td>  {$user['gender']}     </td>";
                    echo "<td>  {$user['email']}      </td>";
                    echo "<td>  {$user['address']}    </td>";
                    echo "<td>  {$user['tel']}        </td>";
                    echo "<td>
                                <a class='btn btn-sucess' href='view-handle.php?id={$user['id']}'>View</a>
                                <a class='btn btn-primary' href='edit-handle.php?id={$user['id']}'>Edit</a>
                                <a class='btn btn-danger' href='delete-handle.php?id={$user['id']}'>Delete</a>
                            </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
