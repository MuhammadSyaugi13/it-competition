<?= $this->extend('auth/templates/index') ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-8 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                </div>
                                <form class="user" action="<?= base_url('Auth/daftar'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="email" placeholder="Enter Your Email" name="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" value="<?= old('email'); ?>">

                                        <!-- Jika validation gagal muncilkan ini -->
                                        <div class="invalid-feedback">
                                            <?= '*' . $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user <?= ($validation->hasError('username') ? 'is-invalid' : '') ?>" value="<?= old('username'); ?>" placeholder="Enter Your Username">

                                        <!-- Jika validation gagal muncilkan ini -->
                                        <div class="invalid-feedback">
                                            <?= '*' . $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="exampleInputPassword" placeholder="Password" class="form-control form-control-user <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>">

                                        <!-- Jika validation gagal muncilkan ini -->
                                        <div class="invalid-feedback">
                                            <?= '*' . $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth'); ?>">Have an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>