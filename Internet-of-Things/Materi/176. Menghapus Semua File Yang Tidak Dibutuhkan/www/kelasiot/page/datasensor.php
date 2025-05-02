<?php
  //Variabel sql + = + function select + * + function from + databaseName 
  $sql = "SELECT * FROM data WHERE sensor_actuator = 'sensor'"; //membuat query sql untuk mengambil data dari database
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
            <h1 class="m-0">Sensor</h1>
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
                <h3 class="card-title">Riwayat Data Sensor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Nilai</th>
                    <th>Topic</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)){?>
                      <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['serial_number']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['value']?></td>
                        <td><?php echo $row['mqtt_topic']?></td>
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