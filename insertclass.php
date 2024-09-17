<?php 
include "./includes/db.php";
$class_name = $_POST['class_name'];
$subject_id = $_POST['subject_id'];
$teacher_id = $_POST['teacher_id'];
$sql = "INSERT INTO classes (class_name, subject_id, teacher_id)
        SELECT '$class_name', subjects.s_ID, users.id FROM subjects JOIN users ON subjects.teacher_id = users.id
        WHERE subjects.subject_name = '$subject_id'";
if(mysqli_query($conn, $sql))
{
    header("Location: classform.php?success=true");
}else{
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
?>