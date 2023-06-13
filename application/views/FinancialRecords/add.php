<div class="pagetitle">
  <h1>Add New Record your Financial</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Financial</a></li>
      <li class="breadcrumb-item active">Add New Financial</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_fins/add" method="post">
  <div class="mb-3">
    <label class="form-label" for="date">Date</label>
    <input required class="form-control" type="date" name="date" id="date" placeholder="Masukkan Tanggal">
  </div>

  <div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <input required class="form-control" type="text" name="description" id="description" placeholder="Masukkan jumlah uang yang direncanakan !!">
  </div>

  <div class="mb-3">
    <label class="form-label" for="amount">Amount</label>
    <input required class="form-control" type="number" name="amount" id="amount" placeholder="Masukkan Jumlah Uang Anda">
  </div>

  <div class="mb-3">
    <label class="form-label" for="type">Type</label>
    <select name="type" id="type" required class="form-control" >
      <option value="Pemasukkan">Pemasukkan</option>
      <option value="Pengeluaran">Pengeluaran</option>
    </select>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="<?php echo base_url()?>ds_fins">Kembali</a>
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