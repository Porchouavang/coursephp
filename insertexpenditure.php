<?php 
include "./includes/db.php";
$expenditure = $_POST['expenditure'];
$ex_reason = $_POST['ex_reason'];
$m_status = $_POST['m_status'];
$sql = "INSERT INTO users (expenditure, ex_reason, m_status)
        VALUES ('$expenditure','$ex_reason','$m_status')";
if(mysqli_query($conn, $sql))
{
    header("Location: expenditure.php?success=true");
}else{
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
?>