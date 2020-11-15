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
  <div class="col-sm-3">
    <div class="card shadow border-primary mr-2" style="width:290px; height:150px">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center; ">Proposal Kegiatan</h5>
        <h3 class="card-text" style="text-align: center; margin-top:30px"><?php echo $count; ?></h3>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow border-primary" style="width:290px; height:150px">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">User</h5>
        <h3 class="card-text" style="text-align: center; margin-top:30px"><?php echo $countuser; ?></h3>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card shadow border-primary" style="width:290px; height:150px">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Approved</h5>
        <h3 class="card-text" style="text-align: center; margin-top:30px"><?php echo $countstatus; ?></h3>
      </div>
    </div>
  </div>

  <div class="col-sm">
    <div class="card shadow border-primary" style="width:290px; height:150px">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Pending</h5>
        <h3 class="card-text" style="text-align: center; margin-top:30px"><?php echo $countstatuspending; ?></h3>
      </div>
    </div>
  </div>

</div>


    <div class="row mt-4">
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


            <table class=" table" style="color: black; border: 2px solid black;">

                <tr>
                    <th scope=" col">No.</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Nama Pengusul</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Status</th>
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
                        <?php 
                        $status=$k['status'];
                        if($status==1){                        
                        ?>
                           <a href="<?= base_url('admin/update_status/') . $k['id']. '/' .$k['status']; ?>" class="btn btn-success">Approve</a>

                           <?php 
                        }else{
                           ?>
                              <a href="<?= base_url('admin/update_status/') . $k['id']. '/' .$k['status']; ?>" class="btn btn-danger">Pending</a>

                        <?php }
                        ?>
                        </td>

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