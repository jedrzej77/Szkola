<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="register.php" method="post">
        <div class="form__inputs">
            <input type="text" name="login" placeholder="login" required>
            <input type="text" name="pass" placeholder="password" required>
            <input type="text" name="fname" placeholder="Enter ur name" required>
            <input type="text" name="sname" placeholder="Enter ur surname" required>
            <input type="number" name="age" placeholder="Enter ur age" required>
            <input type="submit">
            <?php

            $servername = "localhost";
            $username = "root";
            
            $conn = mysqli_connect($servername, $username, '', 'school2');

            if (!$conn) {
                error_log("Failed to connect to mysql: " . mysqli_error($conn));
                die("Connection failed: " . mysqli_connect_error());
            }

            else{
                mysqli_select_db($conn, 'school2');
                

                if(isset($_POST["login"]) && isset($_POST["pass"])){
                    
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $fname = $_POST['fname'];
                    $sname = $_POST['sname'];
                    $age = $_POST['age'];

                    if(isset($_POST['takenn']))
                    {
                        $isTaken = 1;
                    }
                    else
                    {
                        $isTaken = 0; 
                    }

                    function checkIfLoginExists($login)
                    {
                        global $conn;
                        $sql2 = "SELECT * FROM users WHERE login = '$login'";
                        $result = mysqli_query($conn, $sql2);
                        $num = mysqli_num_rows($result);
                        if($num > 0)
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                            $sql2 = "SELECT login FROM users";
                            $result = $conn -> query($sql2);         
                            $row = $result -> fetch_array(MYSQLI_NUM);

                            if(checkIfLoginExists($login)) {
                                echo "Login already exists";
                            }

                            else {

                                if ($login == $pass) {
                                    echo "Login and password cannot be the same";
                                }
                                else {
                                    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);  
                                    $sql = "INSERT INTO users(login, pass, taken, name, surname, age)  VALUES ('$login' , '$pass', '$isTaken', '$fname', '$sname', '$age')";
                                    if($conn -> query($sql) === TRUE) {
                                    echo "New record created successfully"; 
                                    header('Location: login.php');
                                }
                                else {
                                    echo "Error: " . $sql . "<br>" . $conn -> error;

                                }
                                }
                               
                            }
                        }        
                }
        ?>
        </div>

    </form>
</body>
</html>