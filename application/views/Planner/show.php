<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section card dashboard">
  <div class="card-body">
    <h5 class="card-title">Data Driver</h5>  

    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Rencana</th>
            <th scope="col">Target</th>
            <th scope="col">Total Terkumpul</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Selesai</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="align-middle">
            <?php $index = 1;?>
            <?php if ($plan) :?>
                <?php foreach ($plan as $key => $dataList) : ?>
                <tr >
                    <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
                    <td scope="col"><?php echo $dataList->name_bill?></td>
                    <td scope="col">Rp. <?php echo number_format((intval($dataList->target_uang)/1000), 3)?></td>
                    <td scope="col">Rp. <?php echo number_format((intval($dataList->uang_now)/1000), 3)?></td>
                    <td scope="col"><?php echo $dataList->status?></td>
                    <td scope="col"><?php echo date("d-m-Y", strtotime($dataList->target_tanggal))?></td>
            

                    <td scope="col">
                        <?php if ($dataList->status == 'Telah Selesai') :?>
                            <a class="btn btn-light" style="font-size: smaller;" name="update">Add Progress</a>
                        <?php else: ?>
                            <a class="btn btn-success" style="font-size: smaller;" href="<?php echo base_url() ?>ds_plan/update?id=<?php echo $dataList->id ?>" value="" name="update"  >Add Progress</a>
                        <?php endif?>

                        <a class="btn btn-info" style="font-size: smaller;" href="<?php echo base_url() ?>ds_plan/history?id=<?php echo $dataList->id ?>" value="" name="edit"  >History Progress</a>
                        <a class="btn btn-secondary" style="font-size: smaller;" href="<?php echo base_url() ?>ds_plan/edit?id=<?php echo $dataList->id ?>" value="" name="edit"  >Edit</a>
                    <a class="btn btn-danger" style="font-size: smaller; " href="<?php echo base_url() ?>ds_plan?delete_id=<?php echo $dataList->id ?>" value="<?php echo $dataList->id ?>" name="delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            <?php endif ?>
        
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