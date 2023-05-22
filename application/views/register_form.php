<div class="container w-full h-custom">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-9 col-lg-6 col-xl-5" data-aos="zoom-out" data-aos-delay="200">
      <img src="<?php echo base_url() ?>assets/img/draw2.png"
        class="img-fluid" alt="Sample image">
    </div>
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="post">

        <div class="divider d-flex align-items-center my-4">
          <h2 class="text-center fw-bold mx-3 mb-0" data-aos="fade-up">Login Form</h2>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3" data-aos="fade-up" data-aos-delay="400">Username :</label>
          <input data-aos="fade-up" data-aos-delay="400" type="text" id="form3Example3" class="form-control form-control-lg <?= form_error('username') ? 'invalid' : '' ?>"
            placeholder="Enter a valid username" name="username" value="<?= set_value('username') ?>" required />
          
          <div class="invalid-feedback">
            <?= form_error('username') ?>
          </div>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3" data-aos="fade-up" data-aos-delay="400">Name :</label>
          <input data-aos="fade-up" data-aos-delay="400" type="text" id="form3Example3" class="form-control form-control-lg <?= form_error('name') ? 'invalid' : '' ?>"
            placeholder="Enter a valid name" name="name" value="<?= set_value('name') ?>" required />
          
          <div class="invalid-feedback">
            <?= form_error('name') ?>
          </div>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3" data-aos="fade-up" data-aos-delay="400">Email  :</label>
          <input data-aos="fade-up" data-aos-delay="400" type="text" id="form3Example3" class="form-control form-control-lg <?= form_error('email') ? 'invalid' : '' ?>"
            placeholder="Enter a valid email " name="email" value="<?= set_value('email') ?>" required />
          
          <div class="invalid-feedback">
            <?= form_error('email') ?>
          </div>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4" data-aos="fade-up" data-aos-delay="400">Password :</label>
          <input data-aos="fade-up" data-aos-delay="400" type="password" id="form3Example4" class="form-control form-control-lg <?= form_error('password') ? 'invalid' : '' ?>"
            placeholder="Enter password" name="password" value="<?= set_value('password') ?>" required/>
          
          <div class="invalid-feedback">
            <?= form_error('password') ?>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <!-- Checkbox -->
          <div class="form-check mb-0" data-aos="fade-up" data-aos-delay="400">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
            <label class="form-check-label" for="form2Example3">
              Remember me
            </label>
          </div>
          <a data-aos="fade-up" data-aos-delay="200" href="#!" class="text-body">Forgot password?</a>
        </div>

        <?php if($this->session->flashdata('message_register_error')): ?>
          <div data-aos="fade-up" data-aos-delay="400" class="invalid-feedback" style="display: block;">
              <?= $this->session->flashdata('message_register_error') ?>
          </div>
        <?php endif ?>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button data-aos="fade-up" data-aos-delay="400" type="submit" class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
          <p data-aos="fade-up" data-aos-delay="400" class="small fw-bold mt-2 pt-1 mb-0">Do You have an account? <a href="#!"
              class="link-danger">Login</a></p>
        </div>

      </form>
    </div>
  </div>
</div>

