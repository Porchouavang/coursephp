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

$sql = "SELECT * FROM users  WHERE is_delete=0 AND role= 3 ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if(isset($_GET['success']) && $_GET['success'] === 'true') {
    echo " <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script>
      // Check the condition for success
      var isSuccess = true; // Replace this with your actual condition
  
      // If the condition is met, show the success message
      if (isSuccess) {
        Swal.fire({
              title: 'ບັນທຶກສຳເລັດ',
              text: 'ຂໍ້ມູນໄດ້ຖືກບັນທຶກສຳເລັດແລ້ວ',
              icon: 'success',
              timer: 2000, // 2-3 seconds
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
          }}
    )};
  </script>';";
} elseif(isset($_GET['success']) && $_GET['success'] === 'false') {
    echo "<script>alert('Data error');</script>";
}
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
                    <h1 class="text-center text-bold">ຟອມຄູ-ອາຈານ</h1>
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ການເພີ່ມຄູ-ອາຈານ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="insertteacher.php" enctype="multipart/form-data">
              <div class="card-body">
                 <div class="row">
                 <div class="form-group ml-4">
                   <label for="exampleInputEmail1">ຊື່</label>
                   <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" required placeholder="ກະລຸນາປ້ອນຊື່">
                   </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ນາມສະກຸນ</label>
                   <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນນາມສະກຸນ">
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ໂປຣຟາຍ</label>
                   <input type="file" name="fileToUpload" class="form-control" id="exampleInputPassword1" required >
                 </div>
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
                   <input type="date" name="birthday" class="form-control" id="exampleInputPassword1" required>
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputEmail1">ອີເມວ</label>
                   <input type="email" name="email" class="form-control" id="exampleInputEmail1" required placeholder="email@gmail.com">
                   </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ລະຫັດຜ່ານ</label>
                   <input type="password" name="password" class="form-control" id="exampleInputPassword1" required placeholder="*******">
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ອາຍຸ</label>
                   <input type="number" name="age" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນອາຍຸ">
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
                   <input type="text" name="district" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນເມືອງ">
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ບ້ານ</label>
                   <input type="text" name="village" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນບ້ານ">
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ເບີໂທ</label>
                   <input type="text" name="phone" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນເບີໂທ">
                 </div>
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ມືຖື</label>
                   <input type="text" name="mobile" class="form-control" id="exampleInputPassword1" required placeholder="ກະລຸນາປ້ອນເບີມືຖື">
                 </div>
                 
                 <div class="form-group ml-4">
                   <label for="exampleInputPassword1">ສະຖານະ</label>
                   <select name="t_status" id="" class="form-control">
                    <option value="ໂສດ">ໂສດ</option>
                    <option value="ແຕ່ງງານ">ແຕ່ງງານ</option>
                    <option value="ອື່ນໆ">ອື່ນໆ</option>
                   </select>
                 </div>
                 </div>
               </div>
               <!-- /.card-body -->

               <div class="card-footer">
                 <button type="submit" class="btn btn-primary">ສົ່ງຟອມ</button>
               </div>
              </form>
            </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12" style="overflow:auto">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ໂປຣຟາຍ</th>
                      <th>ຊື່</th>
                      <th>ນາມສະກຸນ</th>
                      <th>ເພດ</th>
                      <th>ວັນເດືອນປີເກີດ</th>
                      <th>ອີເມວ</th>
                      <th>ອາຍຸ</th>
                      <th>ບ້ານ</th>
                      <th>ເມືອງ</th>
                      <th>ແຂວງ</th>
                      <th>ເບີໂທ</th>
                      <th>ປຸ່ມຄຳສັ່ງ</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['id']?></td>
                        <td class="pdimg"><?php $filePath = $row["profile"];
                          echo '<img src="' . $filePath . '" alt="Uploaded Image" width="100">'; ?>
                      </td>
                        <td><?php echo $row['first_name']?></td>
                        <td><?php echo $row['last_name']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['birthday']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['age']?></td>
                        <td><?php echo $row['village']?></td>
                        <td><?php echo $row['district']?></td>
                        <td><?php echo $row['province']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><a href="editparents.php?id=<?php echo $row['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a><a href="#" onclick="confirmDelete(<?php echo $row['id'];?>)" class="btn btn-danger"><i class="fas fa-times"></i></a><a href="viewteacher.php?id=<?php echo $row['id']?>" class="btn btn-success ml-1"><i class="fas fa-eye"></i></a></td>
                      </tr>
                      <?php }?>
                  </tbody>
                </table>
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
        window.location.href = 'deleteteacher.php?id=' + $id;
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
