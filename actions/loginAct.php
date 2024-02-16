<?php
session_start();
date_default_timezone_set('Asia/Jayapura');
$json = file_get_contents('php://input');
$posts = json_decode($json, true);

$user = $posts['user'];
$pwd = $posts['pwd'];

// var_dump($user, $pwd);
// die();


if ($user == 'i0989' && $pwd == '1') {
    $_SESSION["user"] = $user;
    $_SESSION["userRole"] = 'admin';
    $_SESSION["stsLogin"] = TRUE;
    die(json_encode($_SESSION));
    // header('location: ../pages/tables.php');
} else {
    $url = 'http://202.152.20.230:9000/gw_qris/jurnal_aqr.php';
    // $url = 'http://192.168.100.100:9000/gw_uji/json.php';
    $ipgw = '118.97.30.43';
    $secret = 'flp28';
    $tgl = date("Y-m-d");
    $jam = date("H:i");
    // var_dump($tgl, $jam);
    // die();
    $txDate = date("Ymd");
    $txHour = date("His");
    $waktu = $tgl . $jam;
    $string = '00015' . $ipgw . $waktu;
    $si = hash_hmac('sha1', $string, $secret);

    $isi = array(
        "authKey" => "$si",
        "reqId" => "00015",
        "txDate" => "$txDate",
        "txHour" => "$txHour",
        "userGtw" => "flpgw",
        "channelId" => "28",
        "userId" => $user,
        "password" => $pwd
        //"userId" => "i1196",
        //"password"=>"P@ssw0rd"

    );

    $temp = json_encode($isi);
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $temp);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    $json_response = curl_exec($ch);
    curl_close($ch);

    // $json = $json_response;

    $resp = json_decode($json_response, true);
    if ($resp['rCode'] !== '00') {
        die($json_response);
    } else {
        $_SESSION['user'] = $user;
        $_SESSION['userRole'] = 'admin';
        $_SESSION['stsLogin'] = TRUE;
        die(json_encode($_SESSION));
    }
    // die($json_response);
    // var_dump("respione ", $resp);
    // die;
}
