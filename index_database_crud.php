<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form{
            border: 1px solid black;
            border-radius: 5px;
            padding: 60px;
            margin: 40px;
        }
    </style>
</head>
<body>
    <form class="form-inline" action="form-handler.php" method="POST">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div><br>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div><br>

        <div class="form-group">
            <label>Gender:</label>
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female" required>
        </div><br>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div><br>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div><br>

        <div class="form-group">
            <label for="tel">Phone Number:</label>
            <input type="tel" class="form-control" id="tel" name="tel" required>
        </div><br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
