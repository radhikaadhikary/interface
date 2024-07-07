<?php
require('../config/config.php');


if(isset($_GET['id'])){
    $id= $_GET['id'];
    $select="DELETE FROM form where id=$id";
    $select_result= mysqli_query($con, $select);

    header('Location:index.php');
}


?>  