<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
    header("location: ../login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_username = $_SESSION["ses_username"];
    $data_password = $_SESSION["ses_password"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data Transaksi</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

</head>

<body>

    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nama
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Kelas
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    SPP
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Seragam
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Kegiatan
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Gedung
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Total
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tanggal
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    SPP Belum Bayar
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Seragam Belum Bayar
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Kegiatan Belum Bayar
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Gedung Belum Bayar
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Jumlah Terbayar
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Jumlah Belum Bayar
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
            $from_date2 = $_GET['from_date2'];
            $to_date2 = $_GET['to_date2'];
            $nama_siswa = $_GET['nama-siswa'];


            $query  = "SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id WHERE tb_report.tanggal BETWEEN '$from_date2' AND '$to_date2' AND tb_siswa.id = '$nama_siswa' GROUP BY tb_report.id ORDER BY tb_siswa.nama desc";
            $result = mysqli_query($koneksi, $query);

            $no     = 1;

            while ($row = mysqli_fetch_array($result)) {

                $ReportNama = $row['nama'];
                $ReportKelas = $row['kelas'];
                $ReportSPP = $row['spp'];
                $ReportSeragam = $row['seragam'];
                $ReportKegiatan = $row['kegiatan'];
                $ReportGedung = $row['gedung'];
                $ReportTotal = $row['total'];
                $ReportTanggal = $row['tanggal'];
                $ReportJumlahSPPBelumBayar = $row['jmlsppbelumbayar'];
                $ReportJumlahSeragamBelumBayar = $row['jmlseragambelumbayar'];
                $ReportJumlahKegiatanBelumBayar = $row['jmlkegiatanbelumbayar'];
                $ReportJumlahGedungBelumBayar = $row['jmlgedungbelumbayar'];
                $ReportJumlahTerbayar = $row['jmlterbayar'];
                $ReportJumlahBelumTerbayar = $row['ygbelumdibayar'];


            ?>
                <tr>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportNama; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportKelas; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportSPP; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportSeragam; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportKegiatan; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportGedung; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportTotal; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportTanggal; ?></span>
                    </td>



                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahSPPBelumBayar; ?></span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportJumlahSeragamBelumBayar; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahKegiatanBelumBayar; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahGedungBelumBayar; ?></span>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportJumlahTerbayar; ?></span>
                    </td>


                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahBelumTerbayar; ?></span>
                    </td>

                </tr>

            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

</body>


</html>