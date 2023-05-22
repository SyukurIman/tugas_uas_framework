
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
              <h5 class="card-title">Bus <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $countBus[0]->dataBus ?></h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Driver <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-pin-map-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $countDriver[0]->dataDriver ?></h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Kondektur <span>| Now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $countKondektur[0]->dataKondektur ?></h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->

        
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">History Perjalanan <span>| Now</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kondektur</th>
                    <th scope="col">Nama Driver</th>
                    <th scope="col">Plat Bus</th>
                    <th scope="col">Status Bus</th>
                    <th scope="col">Total KM</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $index = 1; ?>
                  <?php foreach ($data as $key => $dataList): ?>
                    <tr>
                    <th scope="col" ><a href="#">#<?php echo $index++ ?></a></th>
                    <td scope="col"><?php echo $dataList->nama_kondektur ?></td>
                    <td scope="col"><?php echo $dataList->nama_driver ?></td>
                    <td scope="col"><?php echo $dataList->plat_bus ?></td>
                    
                    <?php if($dataList->status_bus == '1'):?>
                      <td scope="col"><span class="badge bg-success">Active</span></td>
                    <?php elseif($dataList->status_bus == '2'): ?>
                      <td scope="col"><span class="badge">Backup Bus</span></td>
                    <?php elseif($dataList->status_bus == '0'): ?>
                      <td scope="col"><span class="badge">Repair</span></td>
                    <?php endif ?>
                    
                    <td scope="col"><?php echo $dataList->total_km ?></td>
                    <td scope="col"><?php echo $dataList->tanggal ?></td>
                  </tr>
                  <?php endforeach?>
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
          <h5 class="card-title">Data Perjalanan Bus <span>| Now</span></h5>
          <div id="trafficChart" style="min-height: 500px;" class="echart"></div>

          <script>
            var obj = <?php echo json_encode($grafikData); ?>;
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '0%',
                  left: 'center'
                },
                series: [{
                  name: 'Access From',
                  type: 'pie',
                  top: '10%',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                    show: false,
                    position: 'center'
                  },
                  emphasis: {
                    
                    label: {
                      
                      show: true,
                      fontSize: '18',
                      fontWeight: 'bold'
                    }
                  },
                  labelLine: {
                    show: false
                  },
                  data: [
                    <?php foreach($grafikData as $key => $dataBus) : ?>
                    {
                      value: <?php echo $dataBus->total_km?>,
                      name: "<?php echo $dataBus->plat ?>"
                    },
                    <?php endforeach?>
                  ]
                }]
              });
            });
          </script>
        </div>
      </div>
      <!-- End Website Traffic -->
 
    </div>
    <!-- End Right side columns -->

  </div>
</section>
