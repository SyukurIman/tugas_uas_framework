<div class="pagetitle">
  <h1>Add New Driver</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">Edit Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_plan/edit?id=<?php echo $id_plan ?>" method="post">
  <div class="mb-3">
    <label class="form-label" for="name_bill">Nama Rencana</label>
    <input required class="form-control" type="text" name="name_bill" id="name_bill" placeholder="Masukkan Nama Rencana Keuangan Anda" value="<?php echo $plan_data[0]->name_bill ?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="target_uang">Target Pengumpulan Uang</label>
    <input required class="form-control" type="number" name="target_uang" id="target_uang" placeholder="Masukkan jumlah uang yang direncanakan !!" value="<?php echo $plan_data[0]->target_uang ?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="target_tanggal">Tanggal Selesai</label>
    <input required class="form-control" type="date" name="target_tanggal" id="target_tanggal" value="<?php echo date("Y-m-d", strtotime($plan_data[0]->target_tanggal)) ?>">
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="<?php echo base_url()?>ds_plan">Kembali</a>
  </div>
  </form>
</section>

<?php if (isset($msg)):?>
  <script>
    <?php if($msg == 'Edit Success'): ?>
      swal("Success!", "<?php echo $msg ?>", "success", {
        button: "Ok",
      });
    <?php endif ?>
    <?php if($msg == 'Edit Failed'): ?>
      swal("Failed!", "<?php echo $msg ?>", "error", {
        button: "Ok",
      });
    <?php endif ?>
  </script>
<?php endif?>