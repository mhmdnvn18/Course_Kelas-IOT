<?php
  session_start(); //Memulai session
  //conditional statement untuk mengecek apakah session username sudah ada
  if(!isset($_SESSION['username'])){
    echo "<script> location.href='login.php' </script>"; //Jika belum ada, maka akan di-redirect ke halaman login.php
  }


  include "config/database.php"; //Memanggil file database.php dari folder configinclude "inc/header.php"; //Memanggil file header.php dari folder inc
  include "inc/header.php"; //Memanggil file header.php dari folder inc
  include "inc/navbar.php"; //Memanggil file navbar.php dari folder inc
  include "inc/sidebar.php"; //Memanggil file sidebar.php dari folder inc
  include "inc/alerts.php"; //Memanggil file alerts.php dari folder inc
  //conditional statement + function untuk mengecek apakah terdapat parameter page pada URL
  if(isset($_GET['page'])){
    $page = $_GET['page']; //Jika ada, maka nilai dari parameter page disimpan dalam variabel $page
    include "page/".$page.".php"; //Memanggil file footer.php dari folder inc
  } else {
    include "page/dashboard.php"; //Jika tidak ada, maka file dashboard.php akan di-include
  }
  include "inc/footer.php"; //Memanggil file footer.php dari folder inc
  ?>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Ion Slider -->
<script src="plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<script>
  $(function () {
    /* ION SLIDER */
    $('#servo').ionRangeSlider({
      min     : 0,
      max     : 180,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    });
  })
</script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
