<?php
include "./includes/common.php";
checkLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link href='https://fonts.googleapis.com/css?family=Noto Sans Lao' rel='stylesheet'>
</head>
<style>
  * {
    font-family: 'Noto Sans Lao';
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php
    include "./includes/header.php";
    include "./includes/sidebar.php";

    include "./includes/db.php";
    $id = $_GET["id"];

    // Retrieve user information from database
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $gender = $_POST['gender'];
      $birthday = $_POST['birthday'];
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
      // $targetDirectory = "profiles/";
      // $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
      // $uploadOk = 1;
      // $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    

      // Update user information in database
      $sql = "UPDATE users SET  first_name='$first_name', last_name='$last_name', gender='$gender', birthday='$birthday', age='$age', province='$province',
                    district='$district', f_name='$f_name', f_phone='$f_phone', m_name='$m_name', m_phone='$m_phone' WHERE id=$id";
      mysqli_query($conn, $sql);
      echo ' 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    // Check the condition for success
    var isSuccess = true; // Replace this with your actual condition

    // If the condition is met, show the success message
    if (isSuccess) {
      Swal.fire({
            title: "ແກ້ໄຂສຳເລັດ",
            text: "ຂໍ້ມູນໄດ້ຖືກແກ້ໄຂສຳເລັດແລ້ວ",
            icon: "success",
            timer: 2000, // 2-3 seconds
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
        }}
  )};
</script>';
      // Redirect to user profile page
    }

    mysqli_close($conn); // Close database connection
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./">ໜ້າຫຼັກ</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center text-bold">ແກ້ໄຂຂໍ້ມູນນັກສຶກສາລະຫັດທີ່: <?php echo $row['id'] ?></h1>
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">ຂໍ້ມູນນັກສຶກສາ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group ml-4">
                        <label for="exampleInputEmail1">ຊື່</label>
                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                          value="<?php echo $row['first_name'] ?>" required placeholder="ກະລຸນາປ້ອນຊື່">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ນາມສະກຸນ</label>
                        <input type="text" name="last_name" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['last_name'] ?>" required placeholder="ກະລຸນາປ້ອນນາມສະກຸນ">
                      </div>
                      <!-- <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ໂປຣຟາຍ</label>
                   <input type="file" name="fileToUpload" class="form-control" id="exampleInputPassword1" value="<?php echo $row['profile'] ?>" required >
                 </div> -->
                      <div class="form-group ml-4">
                        <label for="exampleInputEmail1">ເພດ</label>
                        <select name="gender" id="" class="form-control">
                          <option value="">-- ກະລຸນາເລືອກ --</option>
                          <option value="ຊາຍ">ຊາຍ</option>
                          <option value="ຍິງ">ຍິງ</option>
                          <option value="ອື່ນໆ">ອື່ນໆ</option>
                        </select>
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ວັນເດືອນປີເກີດ</label>
                        <input type="date" name="birthday" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['birthday'] ?>" required>
                      </div>
                      
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ອາຍຸ</label>
                        <input type="number" name="age" class="form-control" id="exampleInputPassword1" required
                          value="<?php echo $row['age'] ?>" placeholder="ກະລຸນາປ້ອນອາຍຸ">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ແຂວງ</label>
                        <select name="province" id="" class="form-control">
                          <option value="">-- ກະລຸນາເລືອກ --</option>
                          <option value="ອັດຕະປື">ອັດຕະປື</option>
                          <option value="ບໍ່ແກ້ວ">ບໍ່ແກ້ວ</option>
                          <option value="ບໍລິຄຳໄຊ">ບໍລິຄຳໄຊ</option>
                          <option value="ຈຳປາສັກ">ຈຳປາສັກ</option>
                          <option value="ຫົວພັນ">ຫົວພັນ</option>
                          <option value="ຄຳມ່ວນ">ຄຳມ່ວນ</option>
                          <option value="ຫຼວງນ້ຳທາ">ຫຼວງນ້ຳທາ</option>
                          <option value="ຫຼວງພະບາງ">ຫຼວງພະບາງ</option>
                          <option value="ອຸດົມໄຊ">ອຸດົມໄຊ</option>
                          <option value="ຜົ້ງສາລີ">ຜົ້ງສາລີ</option>
                          <option value="ໄຊຍະບູລີ">ໄຊຍະບູລີ</option>
                          <option value="ສາລະວັນ">ສາລະວັນ</option>
                          <option value="ສະຫວັນນະເຂດ">ສະຫວັນນະເຂດ</option>
                          <option value="ເຊກອງ">ເຊກອງ</option>
                          <option value="ນະຄອນຫຼວງວຽງຈັນ">ນະຄອນຫຼວງວຽງຈັນ</option>
                          <option value="ວຽງຈັນ">ວຽງຈັນ</option>
                          <option value="ຊຽງຂວາງ">ຊຽງຂວາງ</option>
                          <option value="ໄຊສົມບູນ">ໄຊສົມບູນ</option>
                        </select>
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ເມືອງ</label>
                        <input type="text" name="district" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['district'] ?>" required placeholder="ກະລຸນາປ້ອນເມືອງ">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ບ້ານ</label>
                        <input type="text" name="village" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['village'] ?>" required placeholder="ກະລຸນາປ້ອນບ້ານ">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ເບີໂທ</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['phone'] ?>" required placeholder="ກະລຸນາປ້ອນເບີໂທ">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ມືຖື</label>
                        <input type="text" name="mobile" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['mobile'] ?>" required placeholder="ກະລຸນາປ້ອນເບີມືຖື">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ຊື່ພໍ່</label>
                        <input type="text" name="f_name" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['f_name'] ?>" required placeholder="ກະລຸນາປ້ອນຊື່ພໍ່">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ເບີໂທພໍ່</label>
                        <input type="text" name="f_phone" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['f_phone'] ?>" required placeholder="ກະລຸນາປ້ອນເບີໂທພໍ່">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ຊື່ແມ່</label>
                        <input type="text" name="m_name" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['m_name'] ?>" required placeholder="ກະລຸນາປ້ອນຊື່ແມ່">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ເບີໂທແມ່</label>
                        <input type="text" name="m_phone" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['m_phone'] ?>" required placeholder="ກະລຸນາປ້ອນເບີໂທແມ່">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ຈຳນວນເງິນ</label>
                        <input type="number" name="income" class="form-control" id="exampleInputPassword1"
                          value="<?php echo $row['income'] ?>" required placeholder="ກະລຸນາປ້ອນຈຳນວນເງິນ">
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ສະຖານະ</label>
                        <select name="status" id="" class="form-control">
                          <option value="ຈ່າຍແລ້ວ">ຈ່າຍແລ້ວ</option>
                          <option value="ຍັງ">ຍັງ</option>
                        </select>
                      </div>
                      <div class="form-group ml-4">
                        <label for="exampleInputPassword1">ຈ່າຍດ້ວຍ</label>
                        <select name="m_status" id="" class="form-control">
                          <option value="ເງິນສົດ">ເງິນສົດ</option>
                          <option value="ເງິນໃນບັນຊີ">ເງິນໃນບັນຊີ</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">ອັບເດດ</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <?php
    include "./includes/footer.php";
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script>
    function confirmDelete($id) {
      // Using SweetAlert2 for the confirmation dialog
      Swal.fire({
        title: 'ຕ້ອງການລຶບແທ້ ຫຼື ບໍ່?',
        text: 'ທ່ານແນ່່ໃຈບໍ ທີ່ຈະລຶບລະຫັດທີ່: ' + $id,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'ຍົກເລີກ',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ຢືນຢັນ!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "ລົບລ້າງ!",
            text: "ຂໍ້ມູນໄດ້ຖືກລຶບສຳເລັດແລ້ວ",
            icon: "success",
            timer: 2000, // 2-3 seconds
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
            }
          }).then(() => {
            window.location.href = 'deletestudent.php?id=' + $id;
          });
        }
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>