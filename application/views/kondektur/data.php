<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_kondektur">Kondektur</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section card dashboard">
  <div class="card-body">
    <h5 class="card-title">Data Kondektur</h5>  

    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id Driver</th>
            <th scope="col">Nama</th>
            <th scope="col">Total KM</th>
            <th scope="col">Total Pendapatan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $index = 1;?>
          <?php foreach ($data as $key => $dataList) : ?>
          <tr >
            <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
            <td scope="col"><?php echo $dataList->id_kondektur ?></td>
            <td scope="col"><?php echo $dataList->nama?></td>

            <?php if($dataList->total_km == ''):?>
              <td scope="col">0</td>
              <td scope="col"><a href="<?php echo base_url() ?>ds_kondektur/penghasilan?id=<?php echo $dataList->id_kondektur ?>">Rp. 0</a></td>
            <?php else: ?>
              <td scope="col"><?php echo $dataList->total_km?></td>
              <td scope="col"><a href="<?php echo base_url() ?>ds_kondektur/penghasilan?id=<?php echo $dataList->id_kondektur ?>">
                Rp. <?php echo number_format($dataList->total_km * 1500, 2)?>
              </a></td>
            <?php endif ?>

            <td scope="col">
              <a class="btn btn-success" style="font-size: smaller;" href="<?php echo base_url() ?>ds_kondektur/edit?id=<?php echo $dataList->id_kondektur ?>" value="" name="edit"  >Edit</a>
              <a class="btn btn-danger" style="font-size: smaller; " href="<?php echo base_url() ?>ds_kondektur?delete_id=<?php echo $dataList->id_kondektur ?>" value="<?php echo $dataList->id_kondektur ?>" name="delete">Delete</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    
  </div>
  
</section>

<?php if (isset($msg)):?>
  <script>
    <?php if($msg == 'Delete Success'): ?>
      swal("Success!", "<?php echo $msg ?>", "success", {
        button: "Ok",
      });
    <?php endif ?>
    <?php if($msg == 'Delete Failed'): ?>
      swal("Failed!", "<?php echo $msg ?>", "error", {
        button: "Ok",
      });
    <?php endif ?>
  </script>
<?php endif?>