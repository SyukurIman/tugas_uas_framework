<div class="pagetitle">
  <h1>Add New Driver</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_driver">Bus</a></li>
      <li class="breadcrumb-item active">Add New Driver</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_driver/add" method="post">
  <div class="mb-3">
    <label class="form-label" for="nama">Nama</label>
    <input required class="form-control" type="text" name="nama" id="Plat" placeholder="Nama Driver">
  </div>

  <div class="mb-3">
    <label class="form-label" for="alamat">Alamat</label>
    <input required class="form-control" type="text" name="alamat" id="Plat" placeholder="Alamat Driver">
  </div>

  <div class="mb-3">
    <label class="form-label" for="no_sim">No Sim</label>
    <input required class="form-control" type="text" name="no_sim" id="Plat" placeholder="No SIM Driver">
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