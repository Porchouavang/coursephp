<?php 
include "./includes/db.php";
$subject_name = $_POST['subject_name'];
$first_name = $_POST['first_name'];
$sql = "INSERT INTO subjects (subject_name, teacher_ID)
        SELECT '$subject_name', u.id FROM users u WHERE u.first_name = '$first_name'";
if(mysqli_query($conn, $sql))
{
    header("Location: subjectform.php?success=true");
}else{
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
?>