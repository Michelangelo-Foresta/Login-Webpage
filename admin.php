<!DOCTYPE html>
<html>
    <header><link rel="stylesheet" href="style1.css"/></header>
<body>
<?php
    include 'databaseCon.php';
    include 'functions.php';
    session_start();
    if(!$_SESSION['admin'])
        header("location: Loggedin.php");

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

    if(isset($_POST['update'])){
        $password=htmlentities($_POST['password']);
        $lastname= htmlentities($_POST['lastname']);
        $firstname= htmlentities($_POST['firstname']);
        $children= htmlentities($_POST['children']);
        $email= htmlentities($_POST['email']);
        $user=$_SESSION['username'];
        
        if(strlen($password)>=1){
            $updateQuery="UPDATE users SET password='$password' WHERE username='$user'";
            mysqli_query(getConn(),$updateQuery);
        }

        if(strlen($firstname)>=1){
            $updateQuery="UPDATE users SET firstname='$firstname' WHERE username='$user'";
            mysqli_query(getConn(),$updateQuery);
        }

        if(strlen($lastname)>=1){
            $updateQuery="UPDATE users SET lastname='$lastname' WHERE username='$user'";
            mysqli_query(getConn(),$updateQuery);
        }
            
        if(strlen($email)>=1){
            $updateQuery="UPDATE users SET email= '$email' WHERE username='$user'";
            mysqli_query(getConn(),$updateQuery);
        }
        if(strlen($children)>=1){
            $updateQuery="UPDATE users SET children=$children WHERE username='$user'";
            mysqli_query(getConn(),$updateQuery);
        }
        $country=htmlentities($_POST['country']);
        $status=htmlentities($_POST['status']);
        $updateQuery="UPDATE users SET country='$country', status='$status' WHERE username='$user'";
        mysqli_query(getConn(),$updateQuery);
    }


    if( isset($_POST['nusername']) )
    {

        $username = hash('sha3-512',htmlentities($_POST['nusername']));
        $password = hash('sha3-512',htmlentities($_POST['npassword']));

        $status= htmlentities($_POST['nstatus']);
        $country= htmlentities($_POST['ncountry']);
        $firstname= htmlentities($_POST['nfirstname']);
        $lastname= htmlentities($_POST['nlastname']);
        $email= htmlentities($_POST['nemail']);
        $children= htmlentities($_POST['nchildren']);

        if(htmlentities($_POST['npassword'])!=htmlentities($_POST['nrepassword'])){
                    echo"<script>alert('Please make sure passwords match!');</script>";
                }
        else{
            $sql="INSERT INTO users(username, password, status, country, firstname, lastname, email, children)
            VALUES ('$username', '$password', '$status', '$country', '$firstname', '$lastname', '$email', '$children')";
            if(mysqli_query(getConn(),$sql))
                echo"<script>alert('Entry Successful!')</script>";
             else
                echo"<script>alert('Entry Error!')</script>";
        }
    }

    if(isset($_POST['data'])){
        $vare=$_POST['data'];
        deleteUser($vare);
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
               <h3><?php echo fetchData(4)?></h3>

               <label>Last name: </label>
               <h3><?php echo fetchData(5)?></h3>

               <label>Email address: </label>
               <h3><?php echo fetchData(6)?></h3>
           </div>

           <div id="third">
               <label>Country: </label>
               <h3><?php echo locale_get_display_region("-".fetchData(3)) ?></h3>
             

               <label>Marital status: </label>
               <h3><?php echo ucfirst(fetchData(2)) ?></h3>

               <label for="kids">Number of children: </label>
               <h3><?php echo fetchData(7) ?></h3>
           </div>

            <div id="updatebutton">
                <form action="editProfile.php">
                    <button type="submit" name="update" id="update">Update Profile</button>
                </form>
            </div>
    </div>
</section>

<section id="currentUsers">
    <div id="users">
        <h1 style="text-align:center">Current Users</h1>
        <table id="myTable">
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
            <th>Remove Users</th>
		</tr>
		
        <?php
            $rows=getUsers();
            foreach($rows as $row){
                echo'<tr><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['email'].'</th>';
                echo'<th><input type="submit" onclick="deleteUsers(this)" value="Delete" style="height:25px; width:60px;background-color:red;border-radius: 10px; border:none;color:white"/></th></tr>';
            }

        ?>
        
	    </table>
        <form action="AddUser.php">
            <div id="updatebutton">
                <button type="submit" id="update">Add User</button>
            </div>
        </form>
        <form method="post" name="usersEmail">
            <input id="hiddenfield" type="text" name="data" hidden>
        </form>
    </div>
</section>   

</body>
</html>