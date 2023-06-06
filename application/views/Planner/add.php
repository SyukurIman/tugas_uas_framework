<div class="pagetitle">
  <h1>Add New Plan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">Add New Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_plan/add" method="post">
  <div class="mb-3">
    <label class="form-label" for="name_bill">Nama Rencana</label>
    <input required class="form-control" type="text" name="name_bill" id="name_bill" placeholder="Masukkan Nama Rencana Keuangan Anda">
  </div>

  <div class="mb-3">
    <label class="form-label" for="target_uang">Target Pengumpulan Uang</label>
    <input required class="form-control" type="number" name="target_uang" id="target_uang" placeholder="Masukkan jumlah uang yang direncanakan !!">
  </div>

  <div class="mb-3">
    <label class="form-label" for="target_tanggal">Tanggal Selesai</label>
    <input required class="form-control" type="date" name="target_tanggal" id="target_tanggal">
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="<?php echo base_url()?>ds_plan">Kembali</a>
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
    <?php if($msg == 'Add Failed'): ?>
      swal("Failed!", "<?php echo $msg ?>", "error", {
        button: "Ok",
      });
    <?php endif ?>
  </script>
<?php endif?>