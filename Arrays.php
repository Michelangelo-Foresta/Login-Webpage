<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style1.css" /></head>
<body>

<?php
    include 'databaseCon.php';
    session_start();

    if($_SESSION){
        if($_SESSION['admin'])
            header("location: admin.php");
        elseif(!$_SESSION['admin'])
            header("location: Loggedin.php");
    }

    if( isset($_POST['Login']) ){
        $usernamelogin=hash('sha3-512',htmlentities($_POST['username']));
        $passwordlogin=hash('sha3-512',htmlentities($_POST['password']));
      

        $sqllog1="SELECT username from users where username='$usernamelogin'";
        $sqllog="SELECT password from users where username='$usernamelogin'";
        $queryUsername= mysqli_query(getConn(),$sqllog1);

        if(is_null(mysqli_fetch_row($queryUsername))){
            echo"<script>alert('Username and/or Password are incorrect here bro!')</script>";
        }
        else{
            $query= mysqli_query(getConn(),$sqllog);
            $result=mysqli_fetch_assoc($query); // fetch password associated with username entered
            $email=mysqli_fetch_assoc(mysqli_query(getConn(),"Select email from users where username='$usernamelogin'"));
            if($passwordlogin == implode($result)){
                echo"<script>alert('Login Successful!')</script>";
                session_regenerate_id();
                $_SESSION['loggedin']=TRUE;
                $_SESSION['username']= $usernamelogin;
                $_SESSION['loginTime']=time();
                $admins=fopen("temp.txt","r");
                if($admins){
                    $adminemails = file('temp.txt', FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
                    echo $email;
                    foreach($adminemails as $line){
                        if(implode($email)==$line){
                            $_SESSION['admin']=TRUE;
                        }
                    }
                }
                fclose($admins);
                if($_SESSION['admin']){
                    header('Location: /admin.php');
                }
                elseif(!$_SESSION['admin']){
                    header('Location: /Loggedin.php');
                }
            }
            else
                echo " <script>alert('this doesn\'t work');</script>";

        }
    }

    if(isset($_POST['forgotpassbutton'])){
        echo "<script>alert('That Sucks for you ! XD');</script>";
    }
?>

<div id="Login">
    <form method="post">
        <img src="Login.png" width="100" height="100"/>
        <h1>Login</h1>
        <p>Sign-in to continue</p>
        <div id="inputs">
            <span id="invalidsignin" style="display:none">Username and/or Password are incorrect!</span><br>
            <label style="margin-left:10px" for="username">Username</label><br>
            <input style="margin-bottom:10px"type="text" placeholder="Enter username" name="username" label="username" id="username"required><br>

            <label style="margin-left:10px" for="password">Password</label><br>
            <input type="password" placeholder="Enter Password" name="password" label="password" id="password" required><br>
        
            <button style="margin-top:10px" id="button"class="glow-on-hover"type="submit" name="Login">Login</button><br>
        </div>
    </form>
    <form method="post">
        <button name="forgotpassbutton" id="forgotpassbutton" ><h3>Forgot Password?</h3></button>
    </form>
    <form action="RegistrationForm.php">
        <button name="signupbutton" id="Signupbutton"><h3>Sign Up</h3></button>
    </form>
    
</div>

</body>
</html>