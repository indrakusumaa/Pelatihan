<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-8">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <p>Field on Rincian Anggaran</p>
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="row-mt-3 mb-3">
        <div class="col-lg">
            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="<?= base_url('admin/update_f/') . $kegiatan['id']; ?> " class="btn btn-primary">Update <i class="fas fa-edit"></i></a>
                <a href="<?= base_url('admin/print/') . $kegiatan['id']; ?>" target="_blank" class="btn btn-warning" style="float: right;">Print <i class="fas fa-print"></i></i></a>

            <?php else : ?>
                <a href="<?= base_url('user/update_f/') . $kegiatan['id']; ?> " class="btn btn-primary">Update <i class="fas fa-edit"></i></a>
                <a href="<?= base_url('user/print/') . $kegiatan['id']; ?>" target="_blank" class="btn btn-warning" style="float: right;">Print <i class="fas fa-print"></i></i></a>
            <?php endif; ?>

        </div>
    </div>

    <style>
        table th,
        tr,
        td {
            background-color: #fff;
            border: 1px solid black !important;
        }

        th,
        .td-rincian {
            text-align: center;
        }
    </style>
    <div class="row-mt-3">
        <div class="col-lg">


            <table class="table table-bordered" style="color: black; border: 2px solid black;">
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
                    <th scope="col">TARGET WAKTU RENCANA</th>
                    <th scope="col">TARGET WAKTU REALISASI</th>
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
                        <td scope="col" rowspan="2"></td>
                    <?php else : ?>
                        <td scope="col" rowspan="2" style="text-align: center; padding-top:15px;"><a href="<?= base_url('assets/uploads/') . $kegiatan['doc_admin']; ?>"><i class="fas fa-file-download"> Download</i></a>
                            <br>
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
        </div>
    </div>
    <!-- Tabel Rincian Anggaran -->
    <!-- Tabel Rincian Anggaran -->
    <!-- Tabel Rincian Anggaran -->
    <hr class="sidebar-divider">
    <hr class="sidebar-divider">
    <hr class="sidebar-divider">
    <div class="row-mt-3">
        <div class="col-lg">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anggaranModal">
                Tambah Data Anggaran
                <i class="fas fa-plus-circle"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="anggaranModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="anggaranModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="anggaranModalLabel">Rincian Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <form action="<?= base_url('admin/tambah_a') ?>" method="post">
                                <?php else : ?>
                                    <form action="<?= base_url('user/tambah_a') ?>" method="post">
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <input type="hidden" name="kegiatan_id" id="kegiatan_id" value="<?= $kegiatan['id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kebutuhan</label>
                                        <input type="text" class="form-control" id="kebutuhan" name="kebutuhan">
                                        <?= form_error('kebutuhan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga">
                                        <?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                                        <?= form_error('jumlah', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan">
                                        <?= form_error('satuan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row-mt-3 tabel">
        <div class="col-lg">

            <table class="table table-bordered mt-3" style="color: black; border: 2px solid black;">

                <tr>
                    <th scope="col"><i class="fas fa-info-circle"> Opsi</i></th>
                    <th scope="col" width="100px">NO</th>
                    <th scope="col" colspan="2">NAMA KEGIATAN</th>
                    <th scope="col" colspan="2">PIC KEGIATAN</th>
                    <th scope="col">KATEGORI KEGIATAN</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <td scope="col"></td>
                    <td scope="col" colspan="2"><?= $kegiatan['nama_keg']; ?></td>
                    <td scope="col" colspan="2"><?= $kegiatan['pic_keg']; ?></td>
                    <td scope="col"><?= $kegiatan['kategori_keg']; ?></td>
                </tr>

                <tr>
                    <th scope="col"></th>
                    <th scope="col" colspan="6">RINCIAN ANGGARAN</th>
                </tr>

                <tr>
                    <th scope="col"></th>
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
                        <th scope="col"></th>
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

                            <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <th scope="col"> <a href="<?= base_url('admin/hapus_r/') . $a['id'] . '/' . $kegiatan['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?');">Delete</a></th>
                            <?php else : ?>
                                <th scope="col"> <a href="<?= base_url('user/hapus_r/') . $a['id'] . '/' . $kegiatan['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?');">Delete</a></th>
                            <?php endif; ?>
                            <td scope="col" class="td-rincian">
                                <?= $i; ?>
                            </td>
                            <td scope="col"><?= $a['kebutuhan']; ?></td>
                            <td scope="col"><?= $a['harga']; ?></td>
                            <td scope="col"><?= $a['jumlah']; ?></td>
                            <td scope="col"><?= $a['satuan']; ?></td>
                            <?php $subtot = $a['harga'] * $a['jumlah']; ?>

                            <?php $total += $subtot; ?>
                            <td scope="col"><?= $subtot; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                <?php endif; ?>

                <tr>
                    <th scope="col"></th>
                    <th scope="col" colspan="2">TOTAL ANGGARAN</th>
                    <th scope="col" colspan="2">PENGUSUL</th>
                    <th scope="col" colspan="2">MENGETAHUI</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <td colspan="2" class="td-rincian">Rp. <?= $total ?></td>
                    <td colspan="2" rowspan="2"></td>
                    <td colspan="2" rowspan="2"></td>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <th colspan="2">CATATAN</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <td colspan="2"><?= $kegiatan['catatan_pic']; ?></td>
                    <td colspan="2"><?= $kegiatan['pengusul']; ?></td>
                    <td colspan="2"><?= $kegiatan['mengetahui']; ?></td>
                </tr>


            </table>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->