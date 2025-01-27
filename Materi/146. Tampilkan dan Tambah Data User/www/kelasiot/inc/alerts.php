<?php
// function + conditional statement untuk menampilkan alert success + parameter message dari file device.php
function alertsSuccess($message){ 
    echo '
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>'
        . $message .
    '</div>
    ';
}
    
?>