<div class="pagetitle">
  <h1>Add New Driver</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">Add Progress Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_plan/update" method="post">
  <div class="mb-3">
    <label class="form-label" for="amount_money">Total Uang Masuk</label>
    <input required class="form-control" type="number" name="amount_money" id="amount_money" placeholder="Masukkan jumlah uang  !!">
  </div>

  <input type="text" hidden name="id_plan" id="id_plan" value="<?php echo $id?>">

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="<?php echo base_url()?>ds_plan">Kembali</a>
  </div>
  </form>
</section>

<?php if (isset($msg)):?>
  <script>
    <?php if($msg == 'Update Success'): ?>
      swal("Success!", "<?php echo $msg ?>", "success", {
        button: "Ok",
      });
    <?php endif ?>
    <?php if($msg == 'Update Failed'): ?>
      swal("Failed!", "<?php echo $msg ?>", "error", {
        button: "Ok",
      });
    <?php endif ?>
  </script>
<?php endif?>