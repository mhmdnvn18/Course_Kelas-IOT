<?php
$page = $_GET['page']; //variabel page = get page
//fuction + conditional statement untuk mengecek apakah terdapat parameter page pada URL
$insert = false; //variabel insert = false
  if(isset($_POST['serial_number'])){ //jika serial_number ada maka
    //variabel + = + function post + id 'name' pada form
    $serial_number = $_POST['serial_number']; //variabel serial_number = post serial_number
    $controller = $_POST['controller']; //variabel controller = post controller  
    $location = $_POST['location']; //variabel location = post location

    //variabel sql + = + function insert into + nama tabel + function values + variabel serial_number, controller, location
    $sql = "INSERT INTO devices (serial_number, mcu_type, location) VALUES ('$serial_number', '$controller', '$location')"; //membuat query sql untuk menambahkan data ke database
    //function result + = + function mysqli_query + variabel conn + variabel sql dari file database.php
    mysqli_query($conn, $sql); //mengeksekusi query
    $insert = true; //variabel insert = true
  }

  if(isset($_GET['edit'])){
    //variabel + = + function get + id 'edit' pada URL
    $id = $_GET['edit']; //fungsi untuk mendapatkan data dari URL
    //variabel sql_select_data + = + function select + * + function from + nama tabel + function where + serial_number = + variabel id + limit 1
    $sql_select_data = "SELECT * FROM devices WHERE serial_number = '$id'LIMIT 1"; //membuat query sql untuk mengambil data dari database
    //function result + = + function mysqli_query + variabel conn + variabel sql_select_data
    $result = mysqli_query($conn, $sql_select_data); //mengeksekusi query
    $data = mysqli_fetch_assoc($result); //variabel data = function mysqli_fetch_assoc + variabel result
  }

  $sql = "SELECT * FROM devices"; //membuat query sql untuk mengambil data dari database
  $result = mysqli_query($conn, $sql); //mengeksekusi query


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

        <!-- Alert -->
        <?php
            //function + conditional statement untuk menampilkan alert success + parameter message dari file device.php
            if($insert){  //jika insert = true maka
              alertsSuccess("Data berhasil ditambahkan"); //memanggil function alertsSuccess
            }
        ?>

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
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- while + variabel row + = + function mysqli_fetch_assoc + variabel result -->
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                      <tr>
                        <!-- function echo + variabel row['nama kolom'] -->
                        <td><?php echo $row['serial_number']?></td> <!--menampilkan data serial_number-->
                        <td><?php echo $row['mcu_type']?></td>
                        <td><?php echo $row['location']?></td>
                        <td><?php echo $row['created_time']?></td>
                        <td><?php echo $row['active']?></td>
                        <!-- tag a + href + = + ?page + = + variabel page + &edit + = + variabel row['serial_number'] -->
                        <td><a href="?page=<?php echo $page ?>&edit=<?php echo $row['serial_number'] ?>"><i class="fas fa-edit"></i></a></td> <!--menambahkan icon edit-->
                      </tr>
                    <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!--conditional statement + function untuk mengecek apakah terdapat parameter edit pada URL-->
            <?php if(!isset($_GET['edit'])){ ?> <!--jika tidak ada maka-->
              <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data</h3>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="?page=device">  <!-- method post untuk mengirimkan data ke server -->
                      <div class="card-body">
                        <div class="form-group">
                          <label>Serial Number</label>
                          <input type="text" class="form-control" name="serial_number" placeholder="1122334455" required>
                        </div>
                        <div class="form-group">
                          <label>Jenis Mikrokontroler</label>
                          <input type="text" class="form-control" name="controller" placeholder="ESP32/ESP8266/other" required>
                        </div>
                        <div class="form-group">
                          <label>Lokasi</label>
                          <div class="input-group">
                          <input type="text" class="form-control" name="location" placeholder="Nama Tempat/Alamat" required>
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

            <!--conditional statement + function untuk mengecek apakah terdapat parameter edit pada URL-->
            <?php } else { ?> <!--jika ada maka-->
              <!-- general form elements -->
              <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data</h3>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="?page=device">  <!-- method post untuk mengirimkan data ke server -->
                      <div class="card-body">
                        <div class="form-group">
                          <label>Serial Number</label>
                          <input type="text" class="form-control" name="serial_number" value="<?php echo $data['serial_number'] ?>" placeholder="1122334455" required>
                        </div>
                        <div class="form-group">
                          <label>Jenis Mikrokontroler</label>
                          <input type="text" class="form-control" name="controller" value="<?php echo $data['mcu_type'] ?>" placeholder="ESP32/ESP8266/other" required>
                        </div>
                        <div class="form-group">
                          <label>Lokasi</label>
                          <div class="input-group">
                          <input type="text" class="form-control" name="location" value="<?php echo $data['location'] ?>" placeholder="Nama Tempat/Alamat" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                            <div class="input-group">
                              <select class="form-control">
                                <!--conditional statement + function untuk mengecek apakah terdapat parameter active pada URL-->
                                <?php if($data['active'] == "yes"){ ?>  <!--jika aktif = yes maka-->
                                  <option>Aktif</option>
                                  <option>Mati</option>
                                <?php } else { ?> <!--jika tidak maka-->
                                  <option>Matif</option>
                                  <option>Aktif</option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Tambah</button>
                      </div>
                    </form>
              </div>
              <!-- /.card -->

            <?php } ?>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->