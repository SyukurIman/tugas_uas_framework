<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_bus">Bus</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section card dashboard">
  <div class="card-body">
    <h5 class="card-title">Data Bus</h5>

    <form action="<?php echo base_url()?>ds_bus" method="post">
      <label for="filter">Filter: </label>
      <select name="filter" id="filter">
        <option value="" selected>All</option>
        <?php if(isset($filter)) : ?>
          <option value="<?php echo $filter ?>" selected hidden>
            <?php
            if ($filter == '1') {
              echo 'Active';
            } elseif($filter == '2'){
              echo 'Cadangan';
            } else {
              echo 'Repair';
            }
            ?>
          </option>
        <?php endif?>
        <option value="1">Active</option>
        <option value="2">Cadangan</option>
        <option value="0">Repair</option>
      </select>
      <button type="submit">Save</button>
    </form>
    
    <div class="w-100 overflow-scroll">
      <table class="table table-borderless datatable align-middle" style="width: 100%; min-width: none;">
        <thead class="table-light align-middle">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id Bus</th>
            <th scope="col">Plat</th>
            <th scope="col">Status</th>
            <th scope="col">Total KM</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $index = 1;?>
          <?php foreach ($data as $key => $dataList) : ?>
          <tr >
            <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
            <td scope="col"><?php echo $dataList->id_bus ?></td>
            <td scope="col"><?php echo $dataList->plat?></td>

            <?php if($dataList->status == '1'):?>
              <td scope="col"><span class="badge bg-success">Active</span></td>
            <?php elseif($dataList->status == '2'): ?>
              <td scope="col"><span class="badge bg-warning">Backup Bus</span></td>
            <?php elseif($dataList->status == '0'): ?>
              <td scope="col"><span class="badge bg-danger">Repair</span></td>
            <?php endif ?>

            <?php if($dataList->total_km == ''):?>
              <td scope="col">0</td>
            <?php else: ?>
              <td scope="col"><?php echo $dataList->total_km?></td>
            <?php endif ?>

            <td scope="col">
              <a class="btn btn-success" style="font-size: smaller;" href="<?php echo base_url() ?>ds_bus/edit?id=<?php echo $dataList->id_bus ?>" value="" name="edit"  >Edit</a>
              <a class="btn btn-danger" style="font-size: smaller; " href="<?php echo base_url() ?>ds_bus?delete_id=<?php echo $dataList->id_bus ?>" value="<?php echo $dataList->id_bus ?>" name="delete">Delete</a>
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