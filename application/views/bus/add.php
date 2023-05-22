<div class="pagetitle">
  <h1>Add New Bus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_bus">Bus</a></li>
      <li class="breadcrumb-item active">Add New Bus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_bus/add" method="post">
  <div class="mb-3">
    <label class="form-label" for="plat">Plat</label>
    <input required class="form-control" type="text" name="plat" id="Plat" placeholder="Plat Number">
  </div>

  <div class="mb-3">
    <label class="form-label" for="status">Status</label>
    <select required class="form-control" name="status" id="productLine">
      <option value="1" selected>Active</option>
      <option value="2">Cadangan</option>
      <option value="0">Repair</option>
    </select>
  </div>

  

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
  </div>
  </form>
</section>

<?php if (isset($msg)):?>
  <script>
    <?php if($msg == 'Add Success'): ?>
      swal("Success!", "<?php echo $msg ?>", "success", {
        button: "Ok",
      });
    <?php endif ?>
    <?php if($msg == 'add Failed'): ?>
      swal("Failed!", "<?php echo $msg ?>", "error", {
        button: "Ok",
      });
    <?php endif ?>
  </script>
<?php endif?>