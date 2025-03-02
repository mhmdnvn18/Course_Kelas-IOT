<?php 

$sql = "SELECT * FROM devices WHERE active = 'Yes'";
$result = mysqli_query($conn, $sql);

?>

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
          <!-- Suhu card-->
          <div class="col-lg-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><span id="suhu">-</span> C</h3>

                <p>Suhu</p>
              </div>
              <div class="icon">
                <i class="fas fa-temperature-high"></i>
              </div>
            </div>
          </div>

          <!-- Kelembapan card -->
          <div class="col-lg-4">
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3><span id="kelembapan">-</span> %</h3>
                <p>Kelembaban</p>
              </div>
              <div class="icon">
                <i class="fas fa-water"></i>
              </div>
            </div>
          </div>

          <!-- Potentiometer card -->
          <div class="col-lg-4">
            <div class="small-box bg-maroon">
            <div class="inner">
              <h3 id="potentiometer">-</h3>
              <p>Potentiometer</p>
            </div>
            <div class="icon">
              <i class="fas fa-tachometer-alt"></i>
            </div>
            </div>
          </div>

          <!-- slider Potentiometer -->
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Servo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <input id="servo" onchange="publishServo(this)" type="text">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!--Button Lampu-->
          <div class="col-lg-6">
            <!-- Radio Buttons -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Lampu</h3>
              </div>
              <div class="card-body table-responsive pad">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-warning" id="label-lampu1-nyala">
                    <input type="radio" name="lampu1" onchange="publishLampu(this)" id="lampu1-nyala" autocomplete="off"> Nyala
                  </label>
                  <label class="btn btn-warning" id="label-lampu1-mati">
                    <input type="radio" name="lampu1" onchange="publishLampu(this)" id="lampu1-mati" autocomplete="off"> Mati
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
                    <!-- fungsi while untuk menampilkan data dari database -->
                    <?php while($row = mysqli_fetch_assoc($result)){ ?> <!-- fungsi while + variabel row + fungsi mysqli_fetch_assoc() + variabel result -->
                      <tr>
                        <!-- fungsi untuk menampilkan serial number dan lokasi perangkat -->
                        <td><?php echo $row['serial_number']?></td>
                        <td><?php echo $row['location']?></td>
                        <!-- fungsi untuk menampilkan status perangkat -->
                        <td style="color:red;" id="KELASIOT/STATUS/<?php echo $row['serial_number'] ?>">OFFLINE</td> <!-- properti style + color + id status + fungsi echo + variabel row + ['serial_number'] -->
                      </tr>
                    <?php } ?>
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

<!-- fungsi untuk menambahkan library mqtt -->
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

<script>
    // Fungsi untuk menghubungkan ke broker
    const clientId = Math.random().toString(16).substr(2, 8);
    const host = 'wss://kelasiot76.cloud.shiftr.io:443';  // host broker

    const options = {
        keepalive: 30,                // keepalive setiap 30 detik
        clientId: clientId,           // client id
        username:"kelasiot76",        // username
        password:"JVxbR1CjvQJbblrJ",  // password
        protocolId: 'MQTT',           // protocol MQTT
        protocolVersion: 4,           // versi MQTT
        clean: true,                  // clean session
        reconnectPeriod: 1000,        // reconnect setiap 1 detik
        connectTimeout: 30 * 1000,    // timeout setiap 30 detik
    };
    // Fungsi untuk menampilkan status koneksi
    console.log("Menghubungkan ke Broker");
    const client = mqtt.connect(host, options); //fungsi untuk menghubungkan ke broker
    // Fungsi untuk menampilkan status koneksi
    client.on("connect", ()=>{  //ketika terhubung
        console.log("Terhubung"); //menampilkan status terhubung
        document.getElementById("status").innerHTML = "ONLINE"; //menampilkan status terhubung
        document.getElementById("status").style.color = "green"; //menampilkan status terhubung

        client.subscribe("KELASIOT/#", {qos: 1}); //subscribe topik suhu
  });

  //Fungsi untuk menerima pesan dari MQTT Mikrokontroler
  client.on("message", function(topic, payload,){
    //jika topik adalah "KELASIOT/SENSOR/SUHU"
    if(topic == "KELASIOT/SENSOR/SUHU"){ //fungsi if + topik + == + topik yang diinginkan
      document.getElementById("suhu").innerHTML = payload; //mengambil nilai suhu
    } else if(topic === "KELASIOT/SENSOR/KELEMBAPAN"){
      document.getElementById("kelembapan").innerHTML = payload; //mengambil nilai kelembapan
    } else if(topic === "KELASIOT/SENSOR/POTENSIOMETER"){
      document.getElementById("potentiometer").innerHTML = payload; //mengambil nilai potentiometer
    } else if(topic === "KELASIOT/KONTROL/SERVO1" ){
      // fungsi untuk mengambil nilai dari inputan + id inputan + .value
      let servo1 = $("#servo").data("ionRangeSlider");  //fungsi let + variabel + fungsi $() + id inputan + .data("ionRangeSlider")
      
      servo1.update({
          from: payload.toString()
      })
    } else if (topic === "KELASIOT/KONTROL/LED"){
        if(payload == "NYALA"){
          document.getElementById("label-lampu1-nyala").classList.add("active");
          document.getElementById("label-lampu1-mati").classList.remove("active");
        } else {
          document.getElementById("label-lampu1-nyala").classList.remove("active");
          document.getElementById("label-lampu1-mati").classList.add("active");
        }
    }
    //jika topik mengandung "KELASIOT/STATUS/"
    if(topic.includes("KELASIOT/STATUS/")){ //fungsi if + topik + .includes() + topik yang diinginkan
      //fungsi untuk mengambil nilai dari inputan + id inputan + .innerHTML + payload
      document.getElementById(topic).innerHTML = payload;  //fungsi document.getElementById() untuk mengambil nilai dari inputan + id inputan + .innerHTML + payload
      if(payload == "OFFLINE"){ //jika payload adalah "OFFLINE"
        //fungsi document.getElementById() untuk mengambil nilai dari inputan + id inputan + .style.color + "green"
        document.getElementById(topic).style.color = "red"; //menampilkan status OFFLINE
      } else if (payload == "ONLINE"){ //jika payload adalah "ONLINE"
        //fungsi document.getElementById() untuk mengambil nilai dari inputan + id inputan + .style.color + "red"
        document.getElementById(topic).style.color = "green"; //menampilkan status ONLINE
      }
    
    }
  });

  //Fungsi untuk mengirimkan data ke Mikrokontroler
  function publishServo(value){
    // variabel + fungsi document.getElementById() untuk mengambil nilai dari inputan + id inputan + .value
    data = document.getElementById("servo").value; //mengambil nilai servo
    //fungsi client.publish() untuk mengirimkan data ke Mikrokontroler + topik + data + {qos: 1}
    client.publish("KELASIOT/KONTROL/SERVO1", data, {qos: 1, retain:true}); //publish topik servo
  }

  function publishLampu(value){
    // variabel + fungsi document.getElementById() untuk mengambil nilai dari inputan + id inputan + .checked
    if(document.getElementById("lampu1-nyala").checked){
      // variabel data + "MATI" dari topic publish
      data = "NYALA"; 
    }
    if(document.getElementById("lampu1-mati").checked){
      data = "MATI"; 
    }

    client.publish("KELASIOT/KONTROL/LED", data, {qos: 1, retain:true}); //publish topik lampu
  }

  //Token Shifter.io: mqtt://kelasiot76:JVxbR1CjvQJbblrJ@kelasiot76.cloud.shiftr.io
</script>