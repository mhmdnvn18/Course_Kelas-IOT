<?php

$sql = "SELECT * FROM devices WHERE active = 'Yes'";
$result = mysqli_query($conn, $sql);

?>

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
                <div class="col-lg-4">
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3><span id="kelembaban">-</span> %</h3>

                            <p>Kelembaban</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-water"></i>
                        </div>
                    </div>
                </div>
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
                <div class="col-lg-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Lampu</h3>
                        </div>
                        <div class="card-body table-responsive pad">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary" id="label-lampu1-nyala">
                                    <input type="radio" name="lampu1" onchange="publishLampu(this)" id="lampu1-nyala" autocomplete="off"> Nyala
                                </label>
                                <label class="btn btn-primary" id="label-lampu1-mati">
                                    <input type="radio" name="lampu1" onchange="publishLampu(this)" id="lampu1-mati" autocomplete="off"> Mati
                                </label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
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
                                        <th>Location</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['serial_number'] ?></td>
                                        <td><?php echo $row['location'] ?></td>
                                        <td style="color:red;" id="kelasiot/status/<?php echo $row['serial_number'] ?>">offline</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

<script>
    const clientId = Math.random().toString(16).substr(2, 8);
    const host = 'wss://kelasiot.cloud.shiftr.io:443';

    const options = {
        keepalive: 30,
        clientId: clientId,
        username:"kelasiot",
        password:"vwt5TSCSrqqSuqPR",
        protocolId: 'MQTT',
        protocolVersion: 4,
        clean: true,
        reconnectPeriod: 1000,
        connectTimeout: 30 * 1000,
    };

    console.log("Menghubungkan ke Broker");
    const client = mqtt.connect(host, options);

    client.on("connect", ()=>{
        console.log("Terhubung");
        document.getElementById("status").innerHTML = "Terhubung";
        document.getElementById("status").style.color = "blue";

        client.subscribe("kelasiot/#", {qos: 1});
    });

    client.on("message", function(topic, payload){
        if(topic === "kelasiot/12345678/suhu"){
            document.getElementById("suhu").innerHTML = payload;
        } else if (topic === "kelasiot/12345678/kelembaban"){
            document.getElementById("kelembaban").innerHTML = payload;
        } else if (topic === "kelasiot/12345678/potentiometer"){
            document.getElementById("potentiometer").innerHTML = payload;
        } else if(topic === "kelasiot/12345678/servo"){
            let servo1 = $("#servo").data("ionRangeSlider")

            servo1.update({
                from: payload.toString()
            })
        } else if(topic === "kelasiot/12345678/led"){
            if(payload == "nyala"){
                document.getElementById("label-lampu1-nyala").classList.add("active");
                document.getElementById("label-lampu1-mati").classList.remove("active");
            } else {
                document.getElementById("label-lampu1-nyala").classList.remove("active");
                document.getElementById("label-lampu1-mati").classList.add("active");
            }
        }

        if(topic.includes("kelasiot/status/")){
            document.getElementById(topic).innerHTML = payload;

            if(payload.toString() === "offline"){
                document.getElementById(topic).style.color = "red";
            } else if(payload.toString() === "online"){
                document.getElementById(topic).style.color = "blue";
            }
        }
    });

    function publishServo(value){
        data = document.getElementById("servo").value;
        client.publish("kelasiot/12345678/servo", data, {qos:1, retain:true});
    }

    function publishLampu(value){
        if(document.getElementById("lampu1-nyala").checked){
            data = "nyala";
        }

        if(document.getElementById("lampu1-mati").checked){
            data = "mati";
        }

        client.publish("kelasiot/12345678/led", data, {qos:1, retain:true});
    }
</script>