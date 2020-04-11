<?php
$data = $_GET['pass'];
if($data == "Al-Quran"){
header("location: ../quran_jemasih_dot_com.zip");
}else{
header("location : https://quran.jemasih.com/download");
}
?>