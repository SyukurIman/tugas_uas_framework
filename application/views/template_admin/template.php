<!DOCTYPE html>
<html lang="en">
  <!-- Head -->
<?php echo @$_head ?>

<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php echo @$_header ?>
  </header>
  <aside id="sidebar" class="sidebar">
    <?php echo @$_aside ?>
  </aside>
  <main id="main" class="main">
    <?php echo @$_content ?>
  </main>
  <footer id="footer" class="footer">
    <?php echo @$_footer ?>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="//cdn.quilljs.com/1.0.0/quill.js"></script>
  <script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.1/echarts.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.2/tinymce.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  
  <script src="<?php echo base_url();?>assets/js/main2.js"></script>
</body>
</html>