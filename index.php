<?php
    include './models/userMysqli.php';
    include_once 'models/userPDO.php';

    $db_type = "mysqli";
    if (isset($_GET["db_type"])) {
        $db_type = $_GET["db_type"];
    }

    if ($db_type == "mysqli") {
        $user_db = new userMysqli();
    } else {
        $user_db =  new userPDO();
    }

    if (isset($_POST["update"])) {
        $type = "update";
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    } else {
        $type = "create";
        $id = "";
        $name = "";
        $email = "";
        $phone = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./public/js/sitescript.js"></script>

    <title>Document</title>
</head>
<body>


    <div class="container">
        <div class="dropdown" id="db_type">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                DB_TYPE
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="?db_type=pdo">PDO</a>
                <a class="dropdown-item" href="?db_type=mysqli">mysqli</a>
            </div>
        </div>
        <label form="input"><h2>INPUT</h2></label>
        <form action="./modify_user.php" method="post" id="input">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name here! ex: John Smith" value='<?php echo $name; ?>'>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email! ex: a@example.com" value='<?php echo $email; ?>'>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" id="phone" type="tel" name="phone" placeholder="Enter your phone number here! ex: 0123456789" value='<?php echo $phone; ?>'>
            </div>

            <input type="hidden" name="id" value='<?php echo $id ?>'>
            
            <button type="submit" class="btn btn-primary" name="<?php echo $type; ?>" id="submit">Submit</button>
        </form>


        <article id="list">

            <div class="row">
            <?php
                $userList = $user_db->readAllUser();

                foreach ($userList as $user) {
            ?>

            <div class="col-md-4">
                <div class="info">
                    Name: <?php echo $user['name']; ?>
                    <br>
                    Email: <?php echo $user['email']; ?>
                    <br>
                    Phone: <?php echo $user['phone']; ?>
                    <hr>

                    <form action="index.php" method="post" class="commandBtn">
                        <input type="hidden" name="id" value=<?php echo $user['id']; ?>>
                        <input type="hidden" name="name" value='<?php echo $user['name']; ?>'>
                        <input type="hidden" name="email" value=<?php echo $user['email']; ?>>
                        <input type="hidden" name="phone" value=<?php echo $user['phone']; ?>>

                        <button type='submit' name="update">Edit</button>
                    </form>  

                    <form action="modify_user.php" method="post" class="commandBtn">
                        <input type="hidden" name="id" value = <?php echo $user['id']; ?>>
                        <button type='submit' name="delete">Delete</button>
                    </form>
                </div>
            </div>  

             <?php } ?>

        </article>
    </div>
</body>
</html>