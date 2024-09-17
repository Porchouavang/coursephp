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

        // Get user ID from URL parameter
        $id = $_GET["id"];

        // Retrieve user information from database
        $sql = "SELECT * FROM classes WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Process form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $class_name = $_POST["class_name"];
            $subject_id = $_POST['subject_id'];
            $teacher_id = $_POST['teacher_id'];

            // Update user information in database
            $sql = "UPDATE `classes` SET `class_name`='$class_name', `teacher_id`='$teacher_id', `subject_id`='$subject_id' WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
                echo ' 
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script>
                Swal.fire({
                    title: "ແກ້ໄຂສຳເລັດ",
                    text: "ຂໍ້ມູນໄດ້ຖືກແກ້ໄຂສຳເລັດແລ້ວ",
                    icon: "success",
                    timer: 2000, // 2-3 seconds
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                }).then(() => {
                    window.location.href = "classform.php"; // Change this to the desired redirect page
                });
                </script>';
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn); // Close database connection
        ?>

        <!-- HTML form to display user information and allow editing -->


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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h1 class="text-center text-bold">ຟອມແກ້ໄຂຂໍ້ມູນAdmin</h1>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">ການແກ້ໄຂຂໍ້ມູນadmin</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group ml-4">
                                                <label for="exampleInputEmail1">ຊື່ຫ້ອງຮຽນ</label>
                                                <input type="text" name="class_name" class="form-control" id="exampleInputEmail1" required value="<?php echo $row['class_name']; ?>" placeholder="ກະລຸນາປ້ອນຊື່ຫ້ອງຮຽນ">
                                            </div>
                                            <div class="form-group ml-4">
                                                <label for="exampleInputPassword1">ຊື່ວິຊາ</label>
                                                <select name="subject_id" id="" class="form-control">
                                                    <?php
                                                    include "./includes/db.php";
                                                    $sql2 = "SELECT * FROM subjects WHERE is_delete = 0";
                                                    $result2 = mysqli_query($conn, $sql2);
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo '<option value="' . $row2['s_ID'] . '">' . $row2['subject_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group ml-4">
                                                <label for="exampleInputPassword1">ຊື່ຄູສອນ</label>
                                                <select name="teacher_id" id="" class="form-control">
                                                    <?php
                                                    include "./includes/db.php";
                                                    $sql3 = "SELECT id, first_name FROM users WHERE is_delete = 0 AND role = 3";
                                                    $result3 = mysqli_query($conn, $sql3);
                                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                                        echo '<option value="' . $row3['id'] . '">' . $row3['first_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">ສົ່ງຟອມ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
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
                        window.location.href = 'deleteadmin.php?id=' + $id;
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