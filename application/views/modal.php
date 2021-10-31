<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Waktu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Jangka</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel9" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Keterangan</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <form class="forms-sample" method="post" action="<?php echo base_url();?>fungsi/get_rein_2">
            <!--Body-->
              <div class="modal-body mb-1">
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Masukan tanggal, bulan atau tahun yang di cari</label>
                  <input type="Date" class="Date form-control" placeholder="dd/mm/yyyy" name="tanggal">
                  
                </div>

                <div class="text-center mt-2">

                  <button type="submit" class="btn btn-primary mr-2">Cari</button>
                </div>
              </div>
            </form>
            <div class="modal-footer">
              <!-- <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div> -->
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <form class="forms-sample" method="post" action="<?php echo base_url();?>fungsi/get_rein_2">
            <!--Body-->
              <div class="modal-body mb-1">
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Masukan tanggal, bulan atau tahun yang di cari Dari</label>
                  <input type="Date" class="Date form-control" placeholder="dd/mm/yyyy" name="tanggal_awal">
                  
                </div>
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Sampai</label>
                  <input type="Date" class="Date form-control" placeholder="dd/mm/yyyy" name="tanggal_akhir">
                  
                </div>

                <div class="text-center mt-2">

                  <button type="submit" class="btn btn-primary mr-2">Cari</button>
                </div>
              </div>
            </form>
            <!--Footer-->
            <div class="modal-footer">
              <!-- <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div> -->
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Panel 8-->
          <!-- panel 9 -->
          <div class="tab-pane fade" id="panel9" role="tabpanel">
            <form class="forms-sample" method="post" action="<?php echo base_url();?>fungsi/get_rein_2">
            <!--Body-->
              <div class="modal-body mb-1">
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Masukan Keterangan</label>
                  <input type="text" class="Date form-control" placeholder="Keterangan" name="keterangan">
                  
                </div>

                <div class="text-center mt-2">

                  <button type="submit" class="btn btn-primary mr-2">Cari</button>
                </div>
              </div>
            </form>
            <div class="modal-footer">
              <!-- <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div> -->
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          <!-- tutup 9 -->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->

<div class="text-center">
  <a href="" class="btn btn-primary mr-3 mt-2 mt-xl-0" data-toggle="modal" data-target="#modalLRForm">Pencarian</a>
</div>