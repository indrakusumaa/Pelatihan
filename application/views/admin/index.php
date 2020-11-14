<style>
    table th,
    tr,
    td {
        background-color: #fff;
        border: 1px solid black !important;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <a href="<?= base_url('admin/tambah') ?> " class="btn btn-primary"> Tambah Proposal Kegiatan <i class="fas fa-plus"></i></a>
            <form style="float: right;" action="<?= base_url('admin'); ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-outline-primary" type="submit" name="submit" id="button-addon2" value="search">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>



    <div class="row mt-3">
        <div class="col-lg">


            <table class=" table table-bordered" style="color: black; border: 2px solid black;">

                <tr>
                    <th scope=" col">No.</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Nama Pengusul</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col" style="text-align: center;"> <i class="fas fa-info-circle"> Opsi</i></th>
                </tr>

                <?php if (empty($kegiatan)) : ?>
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-danger text-center" role="alert">
                                Data not found!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($kegiatan as $k) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>

                        <td width="400px"><?= $k['nama_keg']; ?></td>
                        <td><?= $k['pengusul']; ?></td>
                        <td><?= date('d F Y H:i:s', $k['date_created']); ?></td>

                        <td style="text-align: center;">
                            <a style="margin-right: 5px;" href="<?= base_url('admin/detail/') . $k['id']; ?>" class="badge badge-warning">Detail</a>

                            <a style="text-align: center;" href="<?= base_url('admin/hapus/') . $k['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>


            <?php echo $this->pagination->create_links(); ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->