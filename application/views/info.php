<?php $this->load->view("head")?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php $this->load->view("partical")?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view("slidebar")?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hasil produksi pertahun</h4>
                  <canvas id="areaChart" height="500vh" width="1000vw"></canvas>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pengeluaran</h4>
                  <canvas id="areaChart2"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="pieChart2"></canvas>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php $this->load->view("footer")?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>public/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="<?php echo base_url();?>public/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>public/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>public/js/chart.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }

    $(document).ready(function(){
      $.ajax({
          url:'<?= base_url('welcome/tes') ?>',
          dataType : 'json',
          success :function(data){
            // alert(getRandomColor());
            var rcolor = getRandomColor();

            var areaData = {
              labels: data.bulan,
              datasets: [{
                label: '# of Votes',
                data: data.masuk,
                backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
      ],
      borderColor: [
        'rgba(255,99,132,1)',
      ],
                borderWidth: 1,
                fill: true, // 3: no fill
              }]
            };

            var areaOptions = {
              plugins: {
                filler: {
                  propagate: true
                }
              }
            }

            if ($("#areaChart").length) {
              var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
              var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaData,
                options: areaOptions
              });
            }
          }
        }
      );
    });
  </script>

</body>

</html>
