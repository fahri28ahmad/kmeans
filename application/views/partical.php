<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>aset/logo/kecil 180x40 hitam.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>aset/logo/kecil 180x40 hitam.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <!-- <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li> -->
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo base_url();?>images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name"><?php echo $user['name']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              <a class="dropdown-item" data-toggle="modal" data-target="#modalLRForm1">
                <i class="mdi mdi-settings text-primary" data-toggle="modal" data-target="#modalLRForm1">
                </i>
                Settings
              </a>
              <a class="dropdown-item" href="<?php echo base_url();?>auth/logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

<div class="modal fade" id="modalLRForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Ganti Pasword</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <form class="forms-sample" method="post" action="<?php echo base_url();?>auth/gantipswd">
            <!--Body-->
              <div class="modal-body mb-1">
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Masukan Pasword Lama</label>
                  <input type="password" class="password form-control" placeholder="Pasword Lama" name="Paswordlm">
                </div>
                <div class="md-form form-sm mb-5">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Masukan Baru</label>
                  <input type="password" class="password form-control" placeholder="Pasword Baru" name="passwordbru1">
                  <label data-error="wrong" data-success="right" for="modalLRInput10">Ulangi Password baru </label>
                  <input type="password" class="password form-control" placeholder="Ulangi password baru" name="passwordbru2">
                </div>

                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary mr-2">Ganti Password</button>
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
          <!-- tutup 9 -->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>