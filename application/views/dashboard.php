
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total Pengeluaran <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>Rp. <?php echo number_format((intval($pengeluaran)/1000), 3)  ?></h6>
                  <span class="text-success small pt-1 fw-bold">---</span> <span class="text-muted small pt-2 ps-1">----</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Total Pemasukkan <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-pin-map-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>Rp. <?php echo number_format((intval($pemasukkan)/1000), 3)  ?></h6>
                  <span class="text-success small pt-1 fw-bold">---</span> <span class="text-muted small pt-2 ps-1">----</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Total Uang <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>Rp. <?php echo number_format((intval($total_uang )/1000), 3) ?></h6>
                  <span class="text-danger small pt-1 fw-bold">---</span> <span class="text-muted small pt-2 ps-1">----</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->

        
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">History Plan <span>| Now</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->


      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- Website Traffic -->
      <div class="card">
        <div class="card-body pb-0">
          <h5 class="card-title">Data Keuangan <span>| Now</span></h5>
          <div id="trafficChart" style="min-height: 500px;" class="echart"></div>

        </div>
      </div>
      <!-- End Website Traffic -->
 
    </div>
    <!-- End Right side columns -->

  </div>
</section>
