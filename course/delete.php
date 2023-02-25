<?php include '../connection.php' ?>
<?php include '../isLoggedIn.php' ?>
<?php 
    $code = $_REQUEST['code'];
    $str = "DELETE FROM courses WHERE course_code='".$code."' ";
    if(mysqli_query($conn, $str)){
        header('Location: all.php');
    }
?>