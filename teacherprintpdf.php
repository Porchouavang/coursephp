<?php
include("./includes/common.php");
checkLoggedIn(); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
        include("./includes/db.php");
        $id = $_GET['id'];
        echo $id;?>
    </title>
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
        include("./includes/sidebar.php");
        ?>
        <?php
        include("./includes/db.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = '$id' AND is_delete = 0";
        $result = mysqli_query($conn, $sql);
        if (isset($_GET['success']) && $_GET['success'] === 'true') {
            echo ' 
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
              // Check the condition for success
              var isSuccess = true; // Replace this with your actual condition
          
              // If the condition is met, show the success message
              if (isSuccess) {
                Swal.fire({
                      title: "ບັນທຶກສຳເລັດ",
                      text: "ຂໍ້ມູນໄດ້ຖືກບັນທຶກສຳເລັດແລ້ວ",
                      icon: "success",
                      timer: 2000, // 2-3 seconds
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading();
                  }}
            )};
          </script>';
        } elseif (isset($_GET['success']) && $_GET['success'] === 'false') {
            echo '<script>alert("Error inserting data.");</script>';
        }
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <h4 class="mt-2 text-center text-bold">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</h4>
            <h4 class="mt-2 text-center text-bold">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</h4><br>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1 class="text-center text-primary"><b>School</b></h1><br><br>
                    <div class="row">

                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <h5 class="text-bold">ຊື່ຜູ້ດູແລ: test</h5>
                        </div>
                        <div class="col-md-4">
                            <h2 class="text-center text-primary text-bold">ໃບບິນຄູອາຈານ</h2> 
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-bold" id="datetime"></h6>
                        </div>

                    </div><br>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-1"></div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-10" style="overflow: auto;">
                            <table class="table" border="1">
                                <thead>
                                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        
                                    <tr>
                                        <td><b>ລະຫັດ:</b> <?php echo $row['id'];?></td>
                                        <td><b>ເບີໂທ:</b> <?php echo $row['phone'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ຊື່:</b> <?php echo $row['first_name'];?></td>
                                        <td><b>ມືຖື:</b> <?php echo $row['mobile'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ນາມສະກຸນ:</b> <?php echo $row['last_name'];?></td>
                                        <td><b>ບ້ານ:</b> <?php echo $row['village'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ເພດ:</b> <?php echo $row['gender'];?></td>
                                        <td><b>ເມືອງ:</b> <?php echo $row['district'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ອີເມວ:</b> <?php echo $row['email'];?></td>
                                        <td><b>ແຂວງ:</b> <?php echo $row['province'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ອາຍຸ:</b> <?php echo $row['age'];?></td>
                                        <td><b>ສະຖານະ:</b> <?php echo $row['t_status'];?></td>
                                    </tr>
                                    
                                    </tr>
                                    <?php } ?>
                                </thead>
                            </table>
                        </div>
                        <!--/.col (right) -->

                        <div class="col-md-1"></div>
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div><br>
            
                <h1 class="text-center text-bold">ຂໍຂອບໃຈ</h1>
                <!-- <img src="image/logo.jpg" alt="Logo" class="w-50 h-100 rounded-circle">   -->
           <br><br>
    </div>

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
                    // If the user confirms, redirect to the PHP script handling the delete
                    window.location.href = 'deletenote.php?id=' + $id;
                }
            });
        }
    </script>
       <script>
    // Function to get current date and time
    function showDateTime() {
      var date = new Date();
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, '0');
      var day = date.getDate().toString().padStart(2, '0');
      var hours = date.getHours().toString().padStart(2, '0');
      var minutes = date.getMinutes().toString().padStart(2, '0');
      var seconds = date.getSeconds().toString().padStart(2, '0');
      var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
      document.getElementById("datetime").innerHTML = "ວັນທີ່ເວລາ : " + formattedDateTime;
    }

    // Call the function to display date and time
    showDateTime();
  </script>
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
    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        window.print();
</script>
</body>
</html>