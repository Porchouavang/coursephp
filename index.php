<?php
include("./includes/common.php");
checkLoggedIn(); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ໜ້າຫຼັກ</title>
    <link rel="icon" href="image/logo.jpg">
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
<style>
body {
    font-family: 'Noto Sans Lao';
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php

include("./includes/header.php");
include("./includes/sidebar.php");
include('./includes/db.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <marquee><h1 class="m-0 text-bold text-primary">ຍິນດີຕ້ອນຮັບເຂົ້າສູ່ລະບົບຈັດການໂຮງຮຽນຮຸ່ງສີວິໄລ</h1></marquee>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                
                <h3>
                  <?php
                  $sql = "SELECT SUM(income) as income_sum FROM users WHERE is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['income_sum']."ກີບ";
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ລາຍຮັບ</p>
              </div>
              <div class="icon">
                <i class="ion ion">₭</i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <h3>
                  <?php
                  $sql = "SELECT SUM(expenditure) as expen_sum FROM users WHERE is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['expen_sum']."ກີບ";
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3></h3>

                <p>ລາຍຈ່າຍ</p>
              </div>
              <div class="icon">
                <i class="ion ion">₭</i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT (SUM(income) - SUM(expenditure)) as income_minus_expenditure FROM users WHERE is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['income_minus_expenditure']."ກີບ";
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ເງິນທີ່ຍັງເຫຼືອໃນລະບົບ</p>
              </div>
              <div class="icon">
                <i class="ion ion">₭</i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT COUNT(*) as class_count FROM classes WHERE is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the class count
                      echo $row['class_count'];
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ຫ້ອງຮຽນ</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                
                <h3>
                  <?php
                  $sql = "SELECT COUNT(*) as subj FROM subjects WHERE is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['subj'];
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ວິຊາ</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                
                <h3>
                  <?php
                  $sql = "SELECT COUNT(*) as user_count FROM users WHERE role = 2 AND is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['user_count'];
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ຜູ້ຈັດການ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT COUNT(*) as user_count FROM users WHERE role = 1 AND is_delete = 0";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['user_count'];
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ນັກຮຽນທັງໝົດ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT COUNT(*) as teacher FROM users WHERE role=3";
                  $result = $conn->query($sql);
                  
                  // Check if the query was successful
                  if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();
                      
                      // Display the user count
                      echo $row['teacher'];
                  } else {
                      echo "Error: " . $conn->error;
                  }
                  ?>
                </h3>

                <p>ຄູອາຈານ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-md-12" style="overflow: auto;">
            <table class="table table-striped ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ຊື່</th>
                  <th>ນາມສະກຸນ</th>
                  <th>ເພດ</th>
                  <th>ວັນເດືອນປີເກີດ</th>
                  <th>ອາຍຸ</th>
                  <th>ບ້ານ</th>
                  <th>ເມືອງ</th>
                  <th>ແຂວງ</th>
                  <th>ຄ່າຮຽນ (ຈຳນວນເງິນ)</th>
                  <th>ສະຖານະ</th>
                  <th>ວັນທີ່</th>
                </tr>
              </thead>
              <tbody>
              <?php 
include("./includes/db.php");
$sql = "SELECT * FROM users WHERE role = 1 AND income IS NOT NULL ORDER BY id DESC LIMIT 3 ";
$result = mysqli_query($conn, $sql);?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['birthday']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['village']; ?></td>
                  <td><?php echo $row['district']; ?></td>
                  <td><?php echo $row['province']; ?></td>
                  <td><?php echo $row['income']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php if($row['income'] == null)
                      {
                        echo "<b class='text-danger'><i class='fas fa-times'></i>  ".$row['timestamps']."</b>";
                      }
                      else {
                        echo "<b class='text-success'><i class='fas fa-check'></i>  ".$row['timestamps']."</b>";
                      }
                  ?></td>
                  
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
include("./includes/footer.php");
?>
</div>

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