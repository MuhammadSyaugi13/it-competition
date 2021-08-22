<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>

<div class="container mt-2">

    <h2><?= session()->get('email'); ?></h2>
    <!-- Bagian menu -->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8">
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
                <div class="col-md-6 mt-5 ">
                    <div class="border border-2 rounded-2 border-secondary p-3">
                        <!-- Pemasukan Bulan Ini -->
                        <div class="d-flex justify-content-center">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">Pemasukan Bulan <?= $data['bulan'] ?> :</li>
                                <li class="list-group-item">Rp. <?= number_format($data['incomeBulanan'], 0, ',', '.'); ?></li>
                            </ul>
                        </div>

                        <!-- total pengeluaran bulanan -->
                        <div class="d-flex justify-content-center mt-2">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">Pengeluaran Bulan <?= $data['bulan'] ?> :</li>
                                <li class="list-group-item">Rp. <?= number_format($data['PengeluaranAll']); ?></li>
                            </ul>
                        </div>

                        <!-- Sisa Keuangan Bulanan -->
                        <div class="div d-flex justify-content-center mt-2">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">Sisa Keuang Bulan <?= $data['bulan'] ?> :</li>
                                <li class="list-group-item">Rp. <?= number_format($data['sisaKeuanganAll']); ?></li>
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
                                <li class="list-group-item">Limit Pengeluaran Harian :</li>
                                <li class="list-group-item" id="rupiah">Rp. <?= number_format($data['limitHarian'], 0, ',', '.'); ?></li>
                            </ul>
                        </div>

                        <!-- Sisa Keuangan Harian -->
                        <div class="div d-flex justify-content-center mt-2">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">Pengeluaran Hari Ini :</li>
                                <li class="list-group-item">Rp. <?= number_format($data['debitHarian']); ?></li>
                            </ul>
                        </div>

                        <!-- Sisi Uang Hari Ini -->
                        <div class="div d-flex justify-content-center mt-2">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">Sisa Uang Anda Hari Ini :</li>
                                <li class="list-group-item">Rp. <?= number_format($data['sisaSaldoHarian']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

</div>

<?= $this->endSection(); ?>