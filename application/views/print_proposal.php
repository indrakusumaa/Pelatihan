<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        .table-a th,
        .table-a tr,
        .table-a td {

            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .kop {
            margin-right: 320px;
            float: right;
        }

        .kop td {
            line-height: 0.9;
        }

        .kop td .a {
            line-height: normal;
        }




        .table-a {
            border-style: none;
            border-spacing: 0;
            margin: auto;
            width: 70%;
            border: 2px solid black;
        }

        th,
        .td-rincian {
            text-align: center;
        }
    </style>
</head>

<body id="page-top">




    <table style=" position:absolute;">
        <tr>
            <td><img src="<?= base_url('assets/img/logo.jpg'); ?>" height="90px" width="120px" alt=""></td>
        </tr>
    </table>

    <table class="kop">

        <tr>
            <td class="a" style="font-weight: bold; font-size:19px;">Telkom University <br></td>
        </tr>
        <tr>
            <td>Jl. Telekomunikasi Jl. Terusan Buah Batu</>
            </td>
        </tr>
        <tr>
            <td>Bandung 40257</td>
        </tr>
        <tr>
            <td>Indonesia</td>
        </tr>
        <tr>
            <td width="100%">
                <hr style="border: 1px solid black;">
            </td>
        </tr>


    </table>




    <div class="row">
        <div class="col-lg">
            <div class="container">
                <table style="margin-top: 100px;" class="table-a table-bordered">
                    <tr>

                        <th scope="col">NO</th>
                        <th scope="col" colspan="2">NAMA KEGIATAN</th>
                        <th scope="col">PIC KEGIATAN</th>
                        <th scope="col">KATEGORI KEGIATAN</th>
                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td colspan="2"><?= $kegiatan['nama_keg']; ?></td>
                        <td><?= $kegiatan['pic_keg']; ?></td>
                        <td><?= $kegiatan['kategori_keg']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col" colspan="5">DESKRIPSI KEGIATAN</th>
                    </tr>
                    <tr>
                        <td colspan="5"><?= $kegiatan['deskripsi_keg']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">LUARAN KEGIATAN
                        </th>
                        <th scope="col">KETERANGAN</th>
                        <th scope="col" style="width: 200px;">TARGET WAKTU RENCANA</th>
                        <th scope="col" style="width: 200px;">TARGET WAKTU REALISASI</th>
                        <th scope="col">CATATAN PIC</th>
                    </tr>
                    <tr>
                        <td scope="col"><?= $kegiatan['output_keg']; ?></td>
                        <td scope="col"><?= $kegiatan['keterangan']; ?></td>
                        <td scope="col"><?= $kegiatan['target_waktu_rencana']; ?></td>
                        <td scope="col"><?= $kegiatan['target_waktu_realisasi']; ?></td>
                        <td scope="col"><?= $kegiatan['catatan_pic']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">DOKUMEN ADMINISTRASI</th>
                        <th scope="col" colspan="2">PENGUSUL</th>
                        <th scope="col" colspan="2">MENGETAHUI</th>
                    </tr>
                    <tr>
                        <?php if (empty($kegiatan['doc_admin'])) : ?>
                            <td scope="col"></td>
                        <?php else : ?>
                            <td scope="col" rowspan="2" style="text-align: center; padding-top:15px;">
                                <small><?= $kegiatan['doc_admin']; ?></small>
                            </td>
                        <?php endif; ?>
                        <th scope="col" colspan="2"><br><br></th>
                        <th scope="col" colspan="2"><br><br></th>
                    </tr>

                    <tr>
                        <td scope="col" colspan="2"><?= $kegiatan['pengusul']; ?></td>
                        <td scope="col" colspan="2"><?= $kegiatan['mengetahui']; ?></td>
                    </tr>

                </table>
                <!-- <div style=" height: 800px;"></div> -->

                <p style="page-break-after: always;"></p>

                <table style=" position:absolute;">
                    <tr>
                        <td><img src="<?= base_url('assets/img/logo.jpg'); ?>" height="90px" width="120px" alt=""></td>
                    </tr>
                </table>

                <table class="kop">

                    <tr>
                        <td class="a" style="font-weight: bold; font-size:19px;">Telkom University <br></td>
                    </tr>
                    <tr>
                        <td>Jl. Telekomunikasi Jl. Terusan Buah Batu</>
                        </td>
                    </tr>
                    <tr>
                        <td>Bandung 40257</td>
                    </tr>
                    <tr>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <hr style="border: 1px solid black;">
                        </td>
                    </tr>


                </table>

                <div style="height: 120px;">

                </div>

                <table class="table-a table-bordered mt-3">

                    <tr>

                        <th scope="col" width="100px">NO</th>
                        <th scope="col" colspan="2">NAMA KEGIATAN</th>
                        <th scope="col" colspan="2">PIC KEGIATAN</th>
                        <th scope="col">KATEGORI KEGIATAN</th>
                    </tr>
                    <tr>

                        <td scope="col"></td>
                        <td scope="col" colspan="2"><?= $kegiatan['nama_keg']; ?></td>
                        <td scope="col" colspan="2"><?= $kegiatan['pic_keg']; ?></td>
                        <td scope="col"><?= $kegiatan['kategori_keg']; ?></td>
                    </tr>

                    <tr>

                        <th scope="col" colspan="6">RINCIAN ANGGARAN</th>
                    </tr>

                    <tr>

                        <th scope="col">No.</th>
                        <th scope="col">Kebutuhan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                    <?php $total = 0;
                    $subtot = 0;
                    ?>
                    <?php if (empty($anggaran)) : ?>
                        <tr>

                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                        </tr>

                    <?php else : ?>


                        <?php $i = 1; ?>
                        <?php foreach ($anggaran as $a) : ?>
                            <tr>

                                <td scope="col" class="td-rincian">


                                    <?= $i; ?>
                                </td>
                                <td scope="col"><?= $a['kebutuhan']; ?></td>
                                <td scope="col">Rp. <?= $a['harga']; ?></td>
                                <td scope="col"><?= $a['jumlah']; ?></td>
                                <td scope="col"><?= $a['satuan']; ?></td>
                                <?php $subtot = $a['harga'] * $a['jumlah']; ?>

                                <?php $total += $subtot; ?>
                                <td scope="col">Rp. <?= $subtot; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    <?php endif; ?>

                    <tr>

                        <th scope="col" colspan="2">TOTAL ANGGARAN</th>
                        <th scope="col" colspan="2">PENGUSUL</th>
                        <th scope="col" colspan="2">MENGETAHUI</th>
                    </tr>
                    <tr>

                        <td colspan="2" class="td-rincian">Rp. <?= $total ?></td>
                        <td colspan="2" rowspan="2"></td>
                        <td colspan="2" rowspan="2"></td>
                    </tr>
                    <tr>

                        <th colspan="2">CATATAN</th>
                    </tr>
                    <tr>

                        <td colspan="2"><?= $kegiatan['catatan_pic']; ?></td>
                        <td colspan="2"><?= $kegiatan['pengusul']; ?></td>
                        <td colspan="2"><?= $kegiatan['mengetahui']; ?></td>
                    </tr>


                </table>


            </div>

        </div>
    </div>





    <script>
        window.print();
    </script>

</body>

</html>