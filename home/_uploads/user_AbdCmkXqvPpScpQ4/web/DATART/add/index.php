<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $vip = $_POST['vip'];

    $db = new SQLite3('accs.sqlite');
    $stmt = $db->prepare('INSERT INTO users (email, phone, name, surname, vip) VALUES (:email, :phone, :name, :surname, :vip)');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':phone', $phone, SQLITE3_INTEGER);
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':surname', $surname, SQLITE3_TEXT);
    $stmt->bindValue(':vip', $vip, SQLITE3_INTEGER);

    $stmt->execute();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <script src="./script.js"></script>
</head>

<body>
    <div class="email-card">
        <form action="index.php" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone"><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Jméno"><br>
            <label for="surname">Surname:</label><br>
            <input type="text" id="surname" name="surname" placeholder="Příjmení"><br>
            <label for="vip">VIP:</label><br>
            <input type="text" id="vip" name="vip"><br>

            <input type="radio" id="radio-user" value="0">
            <label for="radio-user">Internet</label><br>
            <input type="radio" id="radio-vip" value="1">
            <label for="radio-vip">VIP</label><br>

            <input type="submit" value="Submit">
        </form> 
    </div>

    <div class="email-card" style="height: unset!important;">
        <div class="row">
            
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>abc@hptronic.cz</td>
                    <td>734656254</td>
                    <td>Jan</td>
                    <td>Novák</td>
                    <td>VIP</td>
                </tr>
            </tbody>
            </table>

        </div>
    </div>
<!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
    <script  src="./script.js"></script>

</body>

</html>
