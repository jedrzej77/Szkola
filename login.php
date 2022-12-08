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
    <form action="login.php" method="post">
        <input type="text" name="login" placeholder="login" required>
        <input type="text" name="pass" placeholder="password" required>
        <input type="submit">
        <link rel="stylesheet" href="style.css">

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
                

                
                    
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $sql = "SELECT * FROM users WHERE login='$login'";
                    $result = mysqli_query($conn,$sql);
                    if ($result) {      
                
                        if (mysqli_num_rows($result)==1) {
                            $row = $result->fetch_assoc();
                            if (password_verify($pass, $row['pass'])) {
                                echo "Login succesfully";
                                header('Location: main.php');
                            }
                            echo "Wrong pass or login";
                            mysqli_close($conn);
                        }
                        if (mysqli_num_rows($result)!=1) {
                            echo "Wrong pass or login";
                            mysqli_close($conn);
                       } 
                    }
                    else {
                        echo "kwerenda nie dziala";
                    }       
            }
        ?>
    </form>








</body>

</html>