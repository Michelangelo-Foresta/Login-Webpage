<?php

function getConn(){
// for this code to work...... PLEASURE INSURE YOU HAVE THE FOLLOWING TABLE SET UP IN YOUR DATABASE --------->
/*
CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `country` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `children` int(11) NOT NULL,
  PRIMARY KEY `username` (`username`) USING HASH
)
*/

  return mysqli_connect("localhost:3306", "mikef", "mike123", "mysql");
}

function insertEntry($username,$password,$status,$country,$firstname,$lastname,$email,$children){
  $sql="INSERT INTO users(username, password, status, country, firstname, lastname, email, children) VALUES ('$username', '$password', '$status', '$country', '$firstname', '$lastname', '$email', '$children')";
  return mysqli_query(getConn(),$sql);
}

function getUsers(){
  $sql="SELECT firstname,lastname,email FROM users";
  $results=mysqli_query(getConn(),$sql);
  while($row=mysqli_fetch_array($results)){
      $rows[]=$row;
  }
  return $rows;
}

function deleteUser($email){
  $username=$_SESSION['username'];
  $selfQuery="SELECT email from users where username='$username'";
  $selfDelete=mysqli_query(getConn(),$selfQuery);
  if($email == implode(mysqli_fetch_assoc($selfDelete))){
     echo"<script>alert('You cannot delete your own account!')</script>";
  }
  else{
      $sql="DELETE FROM users WHERE email='$email'";
      $result=mysqli_query(getConn(),$sql);  
      echo"<script>alert('Account sucessfully deleted!')</script>";
  }

}



?>