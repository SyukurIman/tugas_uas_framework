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
    <h5 class="card-title">Data Bus</h5> 
    
    <form action="<?php echo base_url()?>ds_kondektur/penghasilan?id=<?php echo $data[0]->id_kondektur?>" method="post">
      <label for="startDate">Start: </label>
      <input type="date" name="startDate" id="startDate">
      <label for="endDate">End: </label>
      <input type="date" name="endDate" id="" min='startDate'>
      <button type="submit">Save</button>
    </form>

    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id Kondektur</th>
            <th scope="col">Id Bus</th>
            <th scope="col">No Plat</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total KM</th>
            <th scope="col">Pendapatan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $index = 1;$totalKm = 0; $totalPenghasilan = 0?>
          <?php foreach ($data as $key => $dataList) : ?>
          <tr >
            <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
            <td scope="col"><?php echo $dataList->id_kondektur ?></td>
            <td scope="col"><?php echo $dataList->id_bus?></td>
            <td scope="col"><?php echo $dataList->plat?></td>
            <td scope="col"><?php echo $dataList->tanggal?></td>

            <?php if($dataList->total_km == ''):?>
              <td scope="col">0</td>
              <td scope="col">Rp. 0</td>
            <?php else: ?>
              <td scope="col"><?php echo $dataList->total_km?></td>
              <td scope="col">
                Rp. <?php echo number_format($dataList->total_km * 1500, 2)?>
              </td>
            <?php endif ?>

            <?php $totalKm += $dataList->total_km; ?>
            <?php $totalPenghasilan += $dataList->total_km * 1500; ?>

            <td scope="col">
              <!-- <a class="btn btn-success" style="font-size: smaller;" href="<?php echo base_url() ?>ds_kondektur/edit?id=<?php echo $dataList->id_trans_upn ?>" value="" name="edit"  >Edit</a> -->
              <a class="btn btn-danger" style="font-size: smaller; " href="<?php echo base_url() ?>ds_kondektur/penghasilan?id=<?php echo $dataList->id_kondektur ?>&&delete_id=<?php echo $dataList->id_trans_upn ?>" value="<?php echo $dataList->id_kondektur ?>" name="delete">Delete</a>
            </td>
          </tr>
          <?php endforeach ?>

          <tr>
            <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
            <td></td>
            <td></td>
            <td></td>
            <td colspan=3>Total Keseluruhan</td>
            <td scope="col"><?php echo $totalKm ?></td>
            <td scope="col" colspan="2">Rp. <?php echo number_format($totalPenghasilan, 2)?></td>
          </tr>
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