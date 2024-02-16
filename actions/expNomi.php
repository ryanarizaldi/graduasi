<?php

include "cons.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=flpp.xls");
$tglAwal = $_GET['tglAwal'];
$tglAkhir = $_GET['tglAkhir'];
?>
<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Nomor Rekening
            </th>
            <th>
                Nama Debitur
            </th>
            <th>
                NIK
            </th>
            <th>
                CIF
            </th>
            <th>
                Tanggal Akad
            </th>
            <th>
                Skema
            </th>
            <th>
                Nama Skema
            </th>
            <th>
                Skema Graduasi
            </th>
            <th>
                No Rek. Lama
            </th>
            <th>
                Tanggal Akad Rek. Lama
            </th>
            <th>
                Skema Rek. Lama
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqlReport = "select * from grads where stsgrad = 1 and tgl_akad between '$tglAwal' and '$tglAkhir' order by tgl_akad";
        $inqReport = $sikpDb->query($sqlReport);
        if ($inqReport) {
            $no = 1;
            while ($hasil = mysqli_fetch_assoc($inqReport)) {
        ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $hasil['no_rekening'] ?>
                    </td>
                    <td>
                        <?= $hasil['nama'] ?>
                    </td>
                    <td>
                        <?= $hasil['nik'] ?>
                    </td>
                    <td>
                        <?= $hasil['cif'] ?>
                    </td>
                    <td>
                        <?= $hasil['tgl_akad'] ?>
                    </td>
                    <td>
                        <?= $hasil['skema'] ?>
                    </td>
                    <td>
                        <?= $hasil['skm_name'] ?>
                    </td>
                    <td>
                        <?= $hasil['gradskema'] ?>
                    </td>
                    <td>
                        <?= $hasil['rek_lama'] ?>
                    </td>
                    <td>
                        <?= $hasil['tgl_akad_lama'] ?>
                    </td>
                    <td>
                        <?= $hasil['skema_rek_lama'] ?>
                    </td>
                </tr>
        <?php
                $no++;
            }
        }
        ?>

    </tbody>

</table>