<?php 
include "./includes/db.php";
$s_score = $_POST['s_score'];
$grade = "";
if($s_score>=91 && $s_score<=100){
    $grade = "A";
}elseif($s_score>= 81 && $s_score<=90){
    $grade = "B+";
}elseif($s_score>= 71 && $s_score<=80){
    $grade = "B";
}elseif($s_score>=66 && $s_score<=70){
    $grade = "C+";
}elseif($s_score>=61 && $s_score<=65){
    $grade = "C";
}elseif($s_score>=56 && $s_score<=60){
    $grade = "D+";
}elseif($s_score>=50 && $s_score<=55){
    $grade = "D";
}else{
    $grade = "F";
}
$sql = "INSERT INTO scores (s_score, grade)
        VALUES ('$s_score','$grade')";
if(mysqli_query($conn, $sql))
{
    header("Location: scoreform.php?success=true");
}else{
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
?>