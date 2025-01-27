<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
          <!-- Suhu card-->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>23 C</h3>

                <p>Suhu</p>
              </div>
              <div class="icon">
                <i class="fas fa-temperature-high"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
          <!-- Kelembapan card -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3>75 %</h3>

                <p>Kelembaban</p>
              </div>
              <div class="icon">
                <i class="fas fa-water"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
          <!-- Potentiometer card -->
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3>20</h3>

                <p>Potentiometer</p>
              </div>
              <div class="icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- slider Potentiometer -->
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Servor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <input id="servo" type="text" name="range_6" value="">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--Button Lampu-->
          <div class="col-6">
            <!-- Radio Buttons -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Lampu</h3>
              </div>
              <div class="card-body table-responsive pad">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-warning">
                    <input type="radio" name="options" id="option_a1" autocomplete="off" checked> Nyala
                  </label>
                  <label class="btn btn-warning">
                    <input type="radio" name="options" id="option_a2" autocomplete="off"> Mati
                  </label>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--Fixed Header Table-->
          <div class="col-12">
            <div class="card card-indigo">
              <div class="card-header">
                <h3 class="card-title">Status Perangkat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Lokasi</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Gedung</td>
                      <td>Online</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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