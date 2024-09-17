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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
  *{
    font-family: 'Noto Sans Lao';
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php
  include "./includes/header.php";
include "./includes/sidebar.php";
include "./includes/db.php";

        // Get user ID from URL parameter
        $id = $_GET["id"];

        // Retrieve user information from database
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Process form data when form is submitted
        

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
                    <h1 class="text-center text-bold">ຄູອາຈານລະຫັດທີ່: <?php echo $row['id']?></h1>
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">ການເພີ່ມຄູ-ອາຈານ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
              <div class="d-flex justify-content-between">
                      <p></p>
                      <p><a href="teacherprintpdf.php?id=<?php echo$row['id'];?>" class="btn btn-success btn-sm"><i class="fas fa-print mr-1"></i>Print PDF</a></p>
              </div>
                <p class="text-center">
                <?php $filePath = $row["profile"];
                          echo '<img src="' . $filePath . '" alt="Uploaded Image" width="200" style="border-radius:20%">'; ?>
                </p>
                 <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <div class="row form-group ml-1">
                            <p class="text-bold">ຊື່ : </p> <?php echo$row['first_name'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ນາມສະກຸນ : </p> <?php echo$row['last_name'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ເພດ : </p> <?php echo$row['gender'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ວັນເດືອນປີເກີດ : </p> <?php echo$row['birthday'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ອີເມວ : </p> <?php echo$row['email'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ລະຫັດຜ່ານ : </p> <?php echo$row['password'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ອາຍຸ :  <?php echo$row['age'];?> ປີ</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row form-group ml-1">
                            <p class="text-bold">ບ້ານ : </p> <?php echo$row['village'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ເມືອງ : </p> <?php echo$row['district'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ແຂວງ : </p> <?php echo$row['province'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ເບີໂທ : </p> <?php echo$row['phone'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ມືຖື : </p> <?php echo$row['mobile'];?>
                        </div>
                        <div class="row form-group ml-1">
                            <p class="text-bold">ສະຖານະ : </p> <?php echo$row['t_status'];?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                 </div>
               </div>
               <!-- /.card-body -->
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
