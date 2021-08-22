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

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success mt-2" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('gagalLogin')) : ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                <?= session()->getFlashdata('gagalLogin'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                </div>
                                <form class="user" action="<?= base_url('Auth/masuk'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/register'); ?>">Create an Account!</a>
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