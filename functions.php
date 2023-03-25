<?php 

function fetchData($num){
    $user=$_SESSION['username'];
    $sqllog="Select * from users where username='$user'";
    $query= mysqli_query(getConn(),$sqllog);
    $results=mysqli_fetch_row($query);
    
    return $results[$num];
} 

?>