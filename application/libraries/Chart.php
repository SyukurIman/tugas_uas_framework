<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function generate($config) {
        $chart_id = 'chart-' . uniqid();

        $chart_script = "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('$chart_id').getContext('2d');
                new Chart(ctx, " . json_encode($config) . ");
            });
        </script>";

        return "<canvas id='$chart_id'></canvas>" . $chart_script;
    }

}
