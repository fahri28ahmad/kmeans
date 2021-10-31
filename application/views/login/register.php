<?php $this->load->view("head")?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center>
                  <img src="<?php echo base_url();?>aset/logo/kecil 180x40 hitam.png" alt="logo">
                </center>
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post" action="<?= base_url('auth/register') ?>">
                <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" value="<?= set_value('name');?>">
                  <?= form_error('name', '<small class="text-dager pl-3">', '</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?= set_value('email');?>">
                  <?= form_error('email', '<small class="text-dager pl-3">', '</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  <?= form_error('password', '<small class="text-dager pl-3">', '</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="password" name="password2" id="password2" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Repeat Password">
                  <?= form_error('password2', '<small class="text-dager pl-3">', '</small>');  ?>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?php echo base_url();?>auth" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>