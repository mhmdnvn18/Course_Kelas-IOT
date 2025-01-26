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
            <div class="card card-primary">
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

          <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" class="form-control" placeholder="1122334455">
                  </div>
                  <div class="form-group">
                    <label>Jenis Mikrokontroler</label>
                    <input type="text" class="form-control" placeholder="ESP32/ESP8266/other">
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama Tempat/Alamat">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->