<?php $this->load->view("head")?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view("partical")?>
    <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view("slidebar")?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?= $this->session->flashdata('welcome'); ?> 
            <?php if( $this->session->flashdata("flash") ):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data <strong>Berhasil!</strong> Di Hapus <?php $this->session->flashdata("flash");?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Info</h2>
                    <p class="mb-md-0">Your Information.</p>
                  </div>
                  <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <?php $this->load->view("modal") ?>
                  <button type="button" onclick="window.location.href='<?php echo base_url();?>welcome/pengeluaran'" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-minus text-muted" ></i>
                  </button>
                  <button type="button" onclick="window.location.href='<?php echo base_url();?>welcome/pemasukan'" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted" ></i>
                  </button>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Bulanan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Tahunan</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-arrow-down-bold-hexagon-outline icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Uang Masuk</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-arrow-up-bold-hexagon-outline mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Uang Keluar</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-chart-bar mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Transaksi</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Persentasi</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-arrow-down-bold-hexagon-outline icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Uang Masuk</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-arrow-up-bold-hexagon-outline mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Uang Keluar</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-chart-bar mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Transaksi</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Persentasi</small>
                            <h5 class="mr-2 mb-0"></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Data</p>
                  <div class="table-responsive">
                    <table id="example" class="table table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Waktu</th>
                            <th>B P</th>
                            <th>B K</th>
                            <th>B O</th>
                            <th>Kariawan</th>                            
                            <th>JKM</th>
                            <th>Hasil Produksi</th>
                            <th>Penjualan</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($last_transaction as $l){ $v++;?>
                        <tr>
                            <td><?php echo $v; ?> </td>
                            <td><?php echo $l->date;?></td>
                            <td><?php echo $l->bp;?></td>
                            <td><?php echo $l->bk;?></td>
                            <td><?php echo $l->bo;?></td>
                            <td><?php echo $l->jlm_k;?></td>
                            <td><?php echo $l->jam_km;?></td>
                            <td><?php echo $l->hsl_p;?></td>
                            <td><?php echo $l->penjualan_produk;?></td> 
                            <td>
                            <!-- <buton type="button" onclick="window.location.href='<?php echo base_url();?>welcome/ubah/<?php echo $l->id;?>'" class="btn btn-inverse-info btn-fw" >Ubah</buton><br> -->
                            <buton type="button" onclick="window.location.href='<?php echo base_url();?>welcome/hapus/<?php echo $l->id;?>'" class="badge badge-pill badge-danger">Hapus</buton>
                            </td>  
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <script src="<?php echo base_url();?>public/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>public/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>public/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>public/js/dashboard.js"></script>
  <script src="<?php echo base_url();?>public/js/data-table.js"></script>
  <script src="<?php echo base_url();?>public/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>public/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
</body>

</html>

