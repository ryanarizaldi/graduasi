<?php
include "cons.php";
$json = file_get_contents('php://input');
$posts = json_decode($json, true);
// var_dump($posts);
// die();
$pAwal = $posts['pAwal'];
$pAkhir = $posts['pAkhir'];


$tglAwal = date('Y-m-d 00:00:00', strtotime($pAwal));
$tglAkhir = date('Y-m-d 23:59:59', strtotime($pAkhir));
// var_dump($tglAwal, $tglAkhir);
// die();
$resSql = [];

$sqlLog = "select * from log_grad where time_stamp between '$tglAwal' and '$tglAkhir'";

$inqlog = $sikpDb->query($sqlLog);
if ($inqlog) {
    while ($hasil = mysqli_fetch_assoc($inqlog)) {
        $resSql[] = $hasil;
    }
    $res = ["data" => $resSql];
    die(json_encode($res));
} else {
    die(json_encode($sikpDb->errno));
}
