<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$province = $_POST['province'];
$district = $_POST['district'];
$village = $_POST['village'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$f_name = $_POST['f_name'];
$f_phone = $_POST['f_phone'];
$m_name = $_POST['m_name'];
$m_phone = $_POST['m_phone'];
$income = $_POST['income'];
$status = $_POST['status'];
$m_status = $_POST['m_status'];
$targetDirectory = "profiles/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// ... (same validation checks as before) ...

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file and store file path in database
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    // Now, insert the file path into the database
    $filePath = $targetFile; // this should be the file path relative to your server
    include "./includes/db.php";
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Insert file path into database
    $sql = "INSERT INTO users (profile, first_name, last_name, gender, birthday, email, password, age, province, district, village, phone, mobile, f_name, f_phone, m_name, m_phone, income, status, m_status, role) VALUES ('$filePath','$first_name','$last_name', '$gender', '$birthday', '$email', '$password', '$age', '$province', '$district', '$village', '$phone', '$mobile', '$f_name', '$f_phone', '$m_name', '$m_phone', '$income', '$status', '$m_status', 1)";
    if ($conn->query($sql) === TRUE) {
      header("Location: studentform.php?success=true");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>