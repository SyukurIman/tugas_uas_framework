<!DOCTYPE html>
<html>
<div class="pagetitle">
  <h1>Grafik</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>graphh">Grafik</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div>

<section class="section card dashboard">
  <div class="card-body">
  	<h5 class="card-title">Grafik Pengguna</h5>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart"></canvas>

    <?php
    // Koneksikan ke database
    $kon = mysqli_connect("localhost","root","","new_data_uas");
    //Inisialisasi nilai variabel awal
    $nama_barang= "";
    $jumlah=null;
    //Query SQL
    $sql="select name_bill,COUNT(*) as 'total' from planner GROUP by name_bill";
    $hasil=mysqli_query($kon,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        //Mengambil nilai name_bill dari database
        $name=$data['name_bill'];
        $nama_barang .= "'$name'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }
    ?>
	
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_barang; ?>],
            datasets: [{
                label:'Data Planner ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>
</div>
</section>

</html>
