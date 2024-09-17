<?php 

include "./includes/db.php";

$s_ID = $_GET['s_ID'];

$sql = "UPDATE subjects SET is_delete = 1 WHERE s_ID=$s_ID";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: subjectform.php");
}else{
    echo "Error: " . $sql . "<br>". mysqli_error($conn);
}

mysqli_close($conn);
?>