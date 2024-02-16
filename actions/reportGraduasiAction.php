<?php
include "cons.php";
$json = file_get_contents('php://input');
$posts = json_decode($json, true);

$jnsLap = $posts['jnsLap'];
$pAwal = $posts['pAwal'];
$pAkhir = $posts['pAkhir'];

// $jnsLap = "1";

// $pAwal = '2023-01';
// $pAkhir = '2023-02';
$resSql = [];



$tglAwal = date('Y-m-d', strtotime($pAwal . "-01"));
$tglAkhir = date('Y-m-t', strtotime($pAkhir . "-01"));
// $tglAwal = $pAwal;
// $tglAkhir = $pAkhir;

// var_dump($tglAwal, $tglAkhir, $jnsLap);
// die;

if ($jnsLap == '1') {
    $sqlReport = "select * from grads where stsgrad = 1 and tgl_akad between '$tglAwal' and '$tglAkhir' order by tgl_akad";
} else if ($jnsLap == '2') {
    // $sqlReport = "select year(tgl_akad) as tahun, month(tgl_akad) as bulan, gradskema, count(gradskema) as jumlah from grads where stsgrad = 1 and tgl_akad between '$tglAwal' and '$tglAkhir' group by gradskema, tahun, bulan order by bulan, tahun, gradskema asc
    // ";
    $sqlReport = "select * from gradsrekap where str_to_date(concat(tahun,'-',bulan,'-1'),'%Y-%m-%d')>='$tglAwal' and str_to_date(concat(tahun,'-',bulan,'-1'),'%Y-%m-%d')<='$tglAkhir' order by tahun,bulan";
}

$inqReport = $sikpDb->query($sqlReport);
if ($inqReport) {
    while ($hasil = mysqli_fetch_assoc($inqReport)) {
        $resSql[] = $hasil;
    }
}
// var_dump($resSql);
// die;

if (!$inqReport) {
    $err = $sikpDb->errno;
    die(json_encode($err));
} else {
    $res = [
        'jnLap' => $jnsLap,
        'pAwal' => $pAwal,
        'pAkhir' => $pAkhir,
        'data' => $resSql
    ];
    // var_dump()
    die(json_encode($res));
}
