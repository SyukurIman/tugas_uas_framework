<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">History Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section card dashboard">
  <div class="card-body">
    <h5 class="card-title">Data History</h5>  

    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Pemasukkan</th>
            <th scope="col">Tanggal </th>
          </tr>
        </thead>
        <tbody>
            <?php $index = 1; $total = 0?>
            <?php if($history_plan): ?>
                <?php foreach ($history_plan as $key => $dataList) : ?>
                <tr >
                    <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
                    <td scope="col">Rp. <?php echo number_format((intval($dataList->amount_money)/1000), 3)?></td>
                    <td scope="col"><?php echo $dataList->tanggal?></td>
                    <?php  $total += intval($dataList->amount_money)?>
                </tr>
                <?php endforeach ?>
                <tr>
                    <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
                    <td scope="col" >Total Keseluruhan</td>
                    <td scope="col" >Rp. <?php echo number_format(($total/1000), 3) ?></td>
                </tr>
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