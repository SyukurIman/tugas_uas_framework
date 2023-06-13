<div class="pagetitle">
  <h1>Edit Plan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>ds_plan">Planner</a></li>
      <li class="breadcrumb-item active">Edit Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <form action="<?php echo base_url()?>ds_fins/edit?id=<?php echo $id_record ?>" method="post">
    <div class="mb-3">
      <label class="form-label" for="date">Date</label>
      <input value="<?php echo date("Y-m-d", strtotime($records[0]->date)) ?>" required class="form-control" type="date" name="date" id="date" placeholder="Masukkan Tanggal">
    </div>

    <div class="mb-3">
      <label class="form-label" for="description">Description</label>
      <input value="<?php echo $records[0]->description ?>" required class="form-control" type="text" name="description" id="description" placeholder="Masukkan jumlah uang yang direncanakan !!">
    </div>

    <div class="mb-3">
      <label class="form-label" for="amount">Amount</label>
      <input value="<?php echo $records[0]->amount ?>" required class="form-control" type="number" name="amount" id="amount" placeholder="Masukkan Jumlah Uang Anda">
    </div>

    <div class="mb-3">
      <label class="form-label" for="type">Type</label>
      <select name="type" id="type" required class="form-control" >
        <option value="Pemasukkan" <?= ($records[0]->type == 'Pemasukkan') ? 'selected' : ''?>>Pemasukkan</option>
        <option value="Pengeluaran" <?= ($records[0]->type == 'Pengeluaran') ? 'selected' : ''?>>Pengeluaran</option>
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