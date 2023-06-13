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
    <h5 class="card-title">Data Perencanaan</h5>  

    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            
            <th scope="col">Pemasukkan</th>
            <th scope="col">Pengeluaran</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="align-middle">
            <?php $index = 1; $total_amonut = 0;?>
            <?php if ($records) :?>
                <?php foreach ($records as $key => $dataList) : ?>
                <tr >
                    <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
                    <td scope="col"><?php echo date("d-m-Y", strtotime($dataList->date)) ?></td>
                    <td scope="col"><?php echo $dataList->description ?></td>

                    <?php if ($dataList->type == 'Pemasukkan'): ?>
                      <td scope="col">Rp. <?php echo number_format((intval($dataList->amount)/1000), 3)?></td>
                      <td scope="col">Rp. 0</td>
                      <td scope="col">Rp. <?php echo number_format((intval($total_amonut += $dataList->amount)/1000), 3)?></td>
                    <?php elseif ($dataList->type == 'Pengeluaran'): ?>
                      <td scope="col">Rp. 0</td>
                      <td scope="col">Rp. <?php echo number_format((intval($dataList->amount)/1000), 3)?></td>
                      <td scope="col">Rp. <?php echo number_format((intval($total_amonut -= $dataList->amount)/1000), 3)?></td>
                    <?php endif?>
            

                    <td scope="col">
                        <a class="btn btn-secondary" style="font-size: smaller;" href="<?php echo base_url() ?>ds_fins/edit?id=<?php echo $dataList->id ?>" value="" name="edit"  >Edit</a>
                        <a class="btn btn-danger" style="font-size: smaller; " href="<?php echo base_url() ?>ds_fins?delete_id=<?php echo $dataList->id ?>" value="<?php echo $dataList->id ?>" name="delete">Delete</a>
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