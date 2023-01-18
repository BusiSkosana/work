<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SAPS</title>
    </head>
    <body>
        <fieldset>
            <h3>Sign in</h3>
            <form action="" method="POST">
                <table>
                    <tr><h6> Your email</h6></tr>
                <tr>
                    <td>
                        <input type="email" name="email" required>
                    </td>
                </tr>
                 <tr>
                 <tr><td><h6> Your password</h6></td></tr>
                    <td>
                        <input type="text" name="pass" required>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <input type="submit" name="login" value="LOGIN">
                    </td>
                </tr>
                
                </table>
            </form>
        </fieldset>
        
        
        <?php
        include './connection.php';
        include './controller.php';
        session_start();
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['pass'];
            
            $sql = "SELECT * FROM `users` WHERE Emails =  '$email' && Passwords = '$password '";
            $results = mysqli_query($conn,$sql);
            if($results)
            {
                $rows = mysqli_num_rows($results);
                $data = mysqli_fetch_assoc($results);
                //$id = $data['id'];
                if($rows==1){
                   $_SESSION['email']=$email;
                   $_SESSION['pass']=$password;
                   //$_SESSION['id']=$id;
                   header("location:main.php");
                }else {
                echo 'wrong details';
            }
                
            } 
            
            
            
            
        }
        ?>
    </body>
</html>
