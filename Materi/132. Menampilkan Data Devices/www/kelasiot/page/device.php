<?php
  //Variabel sql + = + function select + * + function from + databaseName 
  $sql = "SELECT * FROM devices"; //membuat query sql untuk mengambil data dari database
  //function result + = + function mysqli_query + variabel conn + variabel sql dari file database.php
  $result = mysqli_query($conn, $sql); //mengeksekusi query
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Perangkat</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12"> 
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Perangkat yang terdaftar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>MCU Type</th>
                    <th>Lokasi</th>
                    <th>Waktu</th>
                    <th>Aktif</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                      <tr>
                        <td><?php echo $row['serial_number']?></td>
                        <td><?php echo $row['mcu_type']?></td>
                        <td><?php echo $row['location']?></td>
                        <td><?php echo $row['created_time']?></td>
                        <td><?php echo $row['active']?></td>
                      </tr>
                    <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->