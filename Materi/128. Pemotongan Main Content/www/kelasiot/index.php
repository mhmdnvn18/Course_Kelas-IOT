<?php
  include "inc/header.php"; //Memanggil file header.php dari folder inc
  include "inc/navbar.php"; //Memanggil file navbar.php dari folder inc
  include "inc/sidebar.php"; //Memanggil file sidebar.php dari folder inc
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
