<!DOCTYPE html>
<html>
<head>
    <title>Welcome Home</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
<?php
    include 'databaseCon.php'; 
    include 'functions.php';
    $timeout=120;
    session_start();
    if(time()-$_SESSION['loginTime']>$timeout){
        session_unset();
        session_destroy();
        header("location: Arrays.php");
    }
    if(!$_SESSION['loggedin'])
        header("location: Arrays.php")
?>

<?php
    if(isset($_POST['logout'])){
        $_SESSION['loggedin']=FALSE;
        session_unset();
        session_destroy();
        $_SESSION=null;
        echo'HELLO'.$_SESSION['name'].'   !!!!!';
        header("location: /Arrays.php");
    }

?>


 
<section id="pageHeader"> 
    <div id="yaya">
        <img src="Login.png" width="75" height="75"/>
        <form method="post">
            <button class="glow-on-hover"type="submit" name="logout" id="signup">Logout</button>
        </form>
    </div>
</section>     

<section id="updateProfileSettings">
    <h1 style="text-align:center"><?php echo ucfirst(fetchData(4));?>'s Profile</h1>
    <div id="login">
        <div id="second">
               <label>First name: </label>
               <div class="userInfo"><?php echo ucfirst(fetchData(4))?></div>

               <label>Last name: </label>
               <div class="userInfo"><?php echo ucfirst(fetchData(5))?></div>

               <label>Email address: </label>
               <div class="userInfo"><?php echo fetchData(6)?></div>
           </div>

           <div id="third">
               <label>Country: </label>
               <div class="userInfo"><?php echo fetchData(3) ?></div>
             

               <label>Marital status: </label>
               <div class="userInfo"><?php echo ucfirst(fetchData(2)) ?></div>

               <label for="kids">Number of children: </label>
               <div class="userInfo"><?php echo fetchData(7) ?></div>
           </div>
        <div id="updatebutton">
            <form action="editProfile.php">
                <button type="submit" name="update" id="update">UPDATE</button>
            </form>
        </div>
    </div>
</section>
   
</body>
</html>
