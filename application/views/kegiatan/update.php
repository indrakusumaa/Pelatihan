<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <?php if ($this->session->userdata('role_id') == 1) : ?>
        <a class="float-right btn btn-primary" href="<?= base_url('admin/detail/') . $kegiatan['id']; ?>"><i class="fas fa-arrow-left"></i></a>

    <?php else : ?>
        <a class="float-right btn btn-primary" href="<?= base_url('user/detail/') . $kegiatan['id']; ?>"><i class="fas fa-arrow-left"></i></a>

    <?php endif; ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <dic class="col-lg">

            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <?php echo form_open_multipart('admin/update_s'); ?>
            <?php else : ?>
                <?php echo form_open_multipart('user/update_s/'); ?>
            <?php endif; ?>

            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?= $kegiatan['id']; ?>">
            </div>

            <div class="form-group">
                <label for="nama_keg">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_keg" name="nama_keg" value="<?= $kegiatan['nama_keg']; ?>">
                <?= form_error('nama_keg', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kategori_keg">Kategori Kegiatan</label>
                    <input type="text" class="form-control" id="kategori_keg" name="kategori_keg" value="<?= $kegiatan['kategori_keg']; ?>">
                    <?= form_error('kategori_keg', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="pic_keg">PIC Kegiatan</label>
                    <input type="text" class="form-control" id="pic_keg" name="pic_keg" value="<?= $kegiatan['pic_keg']; ?>">
                    <?= form_error('pic_keg', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi_keg">Deskripsi Kegiatan</label>
                <textarea class="form-control" id="deskripsi_keg" rows="3" name="deskripsi_keg"><?= $kegiatan['deskripsi_keg']; ?></textarea>
                <?= form_error('deskripsi_keg', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pengusul">Pengusul Kegiatan</label>
                    <input type="text" class="form-control" id="pengusul" name="pengusul" value="<?= $user['name']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="mengetahui">Mengetahui Kegiatan</label>
                    <input type="text" class="form-control" id="mengetahui" name="mengetahui" value="<?= $kegiatan['mengetahui']; ?>">
                    <?= form_error('mengetahui', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="output_keg">Luaran Kegiatan</label>
                <input type="text" class="form-control" id="output_keg" name="output_keg" value="<?= $kegiatan['output_keg']; ?>">
                <?= form_error('output_keg', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $kegiatan['keterangan']; ?>">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="target_waktu_rencana">Target Waktu Rencana</label>
                    <input type="date" class="form-control" id="target_waktu_rencana" name="target_waktu_rencana" value="<?= $kegiatan['target_waktu_rencana']; ?>">
                    <?= form_error('target_waktu_rencana', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="target_waktu_realisasi">Target Waktu Realisasi</label>
                    <input type="date" class="form-control" id="target_waktu_realisasi" name="target_waktu_realisasi" value="<?= $kegiatan['target_waktu_realisasi']; ?>">
                    <?= form_error('target_waktu_realisasi', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="catatan_pic">Catatan PIC</label>
                    <input type="text" class="form-control" id="catatan_pic" name="catatan_pic" value="<?= $kegiatan['catatan_pic']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="doc_admin">Dokumen Administrasi</label>
                    <input type="file" class="form-control" id="doc_admin" name="doc_admin">
                    <?php if (empty($kegiatan['doc_admin'])) : ?>
                        <small>File is Empty</small>
                    <?php else : ?>
                        <small><?= $kegiatan['doc_admin']; ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-sm-0">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>

            </div>
            </form>
        </dic>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->