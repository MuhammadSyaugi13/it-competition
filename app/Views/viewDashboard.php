<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>


<!-- Bagian menu -->
<div class="row d-flex justify-content-center">
    <div class="col-sm-8">
        <button class="btn btn-danger mt-2 float-end"><a href="<?= base_url('auth/logout') ?>" class="text-decoration-none text-light">Logout</a></button>
        <br><br>
        <div class="row d-flex justify-content-sm-around p-3">
            <div class="col-sm-4 mx-2 text-center perencanaan p-2 mt-3">
                <a href="<?= base_url('/planning'); ?>" class="text-decoration-none">
                    <div><i class="fas fa-notes-medical perencanaan-icon"></i></div>
                    <div class="text-center perencanaan-text">Perencanaan Keuangan</div>
                </a>
            </div>
            <div class="col-sm-4 mx-2 text-center pencatatan p-2 mt-3">
                <a href="<?= base_url('/debit'); ?>" class="text-decoration-none">
                    <div><i class="fas fa-book-open pencatatan-icon"></i></div>
                    <div class="text-center pencatatan-text">Catatan Pengeluaran</div>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- Akhir Bagian menu -->
<div class="border-top border-2 mt-3"></div>

<div class="row  mt-4 justify-content-center">
    <div class="col-md-9">
        <div class="row p-1">
            <?php if (session()->getFlashdata('planning')) : ?>
                <div class="alert alert-warning mt-2" role="alert">
                    <?= session()->getFlashdata('planning'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-6 mt-5 ">
                <div class="border border-2 rounded-2 border-secondary p-3">
                    <!-- Pemasukan Bulan Ini -->
                    <div class="d-flex justify-content-center">
                        <ul class="list-group list-group-horizontal ">
                            <li class="list-group-item list-group-item-success">Pemasukan Bulan <?= $data['bulan'] ?> :</li>
                            <li class="list-group-item list-group-item-success">Rp. <?= number_format($data['incomeBulanan'], 0, ',', '.'); ?></li>
                        </ul>
                    </div>

                    <!-- total pengeluaran bulanan -->
                    <div class="d-flex justify-content-center mt-2">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-danger">Pengeluaran Bulan <?= $data['bulan'] ?> :</li>
                            <li class="list-group-item list-group-item-danger">Rp. <?= number_format($data['PengeluaranAll']); ?></li>
                        </ul>
                    </div>

                    <!-- Sisa Keuangan Bulanan -->
                    <div class="div d-flex justify-content-center mt-2">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-warning">Sisa Keuang Bulan <?= $data['bulan'] ?> :</li>
                            <li class="list-group-item list-group-item-warning">Rp. <?= number_format($data['sisaKeuanganAll']); ?></li>
                        </ul>
                    </div>

                </div>
            </div>

            <br><br>

            <div class="col-md-6 mt-5">
                <div class="border border-2 rounded-2 border-secondary p-3">
                    <!-- total pengeluaran bulanan -->
                    <div class="div d-flex justify-content-center">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-success">Limit Pengeluaran Harian :</li>
                            <li class="list-group-item list-group-item-success" id="rupiah">Rp. <?= number_format($data['limitHarian'], 0, ',', '.'); ?></li>
                        </ul>
                    </div>

                    <!-- Sisa Keuangan Harian -->
                    <div class="div d-flex justify-content-center mt-2">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-danger">Pengeluaran Hari Ini :</li>
                            <li class="list-group-item list-group-item-danger">Rp. <?= number_format($data['debitHarian']); ?></li>
                        </ul>
                    </div>

                    <!-- Sisi Uang Hari Ini -->
                    <div class="div d-flex justify-content-center mt-2">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-warning">Sisa Uang Anda Hari Ini :</li>
                            <li class="list-group-item list-group-item-warning">Rp. <?= number_format($data['sisaSaldoHarian']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

</div>

<?= $this->endSection(); ?>