<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>
<div class="container my-3 bgc ">

    <!-- menu -->
    <div class="btn-group sticky-top mt-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <b>Menu</b>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
            <li><a class="dropdown-item" href="<?= base_url('/'); ?>">Dashboard</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/debit'); ?>">Catatan Pengeluaran</a></li>
        </ul>
    </div>
    <!-- akhir menu -->

    <h2 class="mb-5 text-center">Daftar Rencana Keuangan</h2>

    <form action="<?= ($dataPlanning === null) ? base_url('/planning/submit') : base_url('/planning/submit/edit'); ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="container-form rounded-3 ">
            <!-- bulan -->
            <div class="my-3 p-2 pemasukan mx-auto">
                <h4 class="text-center ">Bulan</h4>
                <div class="input-group  my-3 mx-0">
                    <!-- <span class="input-group-text">5.000.000</span> -->
                    <!-- <input type="number" name="pemasukan" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan"> -->

                    <select class="form-select form-control pemasukan rounded-pill text-center" name="bulan">
                        <option value="Januari" <?= ($dataPlanning['bulan'] === "Januari") ? 'selected' : ''; ?>>Januari</option>
                        <option value="Februari" <?= ($dataPlanning['bulan'] === "Februari") ? 'selected' : ''; ?>>Februari</option>
                        <option value="Maret" <?= ($dataPlanning['bulan'] === "Maret") ? 'selected' : ''; ?>>Maret</option>
                        <option value="April" <?= ($dataPlanning['bulan'] === "April") ? 'selected' : ''; ?>>April</option>
                        <option value="Mei" <?= ($dataPlanning['bulan'] === "Mei") ? 'selected' : ''; ?>>Mei</option>
                        <option value="Juni" <?= ($dataPlanning['bulan'] === "Juni") ? 'selected' : ''; ?>>Juni</option>
                        <option value="Juli" <?= ($dataPlanning['bulan'] === "Juli") ? 'selected' : ''; ?>>Juli</option>
                        <option value="Agustus" <?= ($dataPlanning['bulan'] === "Agustus") ? 'selected' : ''; ?>>Agustus</option>
                        <option value="September" <?= ($dataPlanning['bulan'] === "September") ? 'selected' : ''; ?>>September</option>
                        <option value="Oktober" <?= ($dataPlanning['bulan'] === "Oktober") ? 'selected' : ''; ?>>Oktober</option>
                        <option value="November" <?= ($dataPlanning['bulan'] === "November") ? 'selected' : ''; ?>>November</option>
                        <option value="Desember" <?= ($dataPlanning['bulan'] === "Desember") ? 'selected' : ''; ?>>Desember</option>
                    </select>
                </div>
                <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
            </div>
            <!-- Akhir bulan -->
            <br><br><br>
            <!-- pemasukan -->
            <h4 class="text-center mt-6">Pemasukan</h4>
            <div class="my-3 p-2 pemasukan mx-auto">
                <div class="input-group  mb-1 mx-0">
                    <!-- <span class="input-group-text">5.000.000</span> -->
                    <input type="number" name="pemasukan" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center <?= ($validation->hasError('pemasukan') ? 'is-invalid' : '') ?>" id="pemasukan" value="<?= old('pemasukan'); ?>">
                    <!-- Jika validation gagal muncilkan ini -->
                    <div class="invalid-feedback">
                        <?= '*' . $validation->getError('pemasukan'); ?>
                    </div>
                </div>
                <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
            </div>
            <!-- rencana Pengeluaran -->
            <div class="m-5  border-2 p-2 rounded-3">

                <div class="areaPlanning">
                    <h4 class="text-center">Limit Pengeluaran Harian</h5>

                        <div class="input-group my-3  mx-0">
                            <!-- <span class="input-group-text">5.000.000</span> -->
                            <input type="number" name="limitPengeluaran" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center <?= ($validation->hasError('limitPengeluaran') ? 'is-invalid' : '') ?>" id="pemasukan" value="<?= old('limitPengeluaran'); ?>">
                            <div class="invalid-feedback">
                                <?= '*' . $validation->getError('limitPengeluaran'); ?>
                            </div>
                        </div>

                        <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
                </div>
                <br><br>
                <?php if ($dataPlanning != null) : ?>

                    <div class="form-check">
                        <input class="form-check-input" name="konfirmasi" type="checkbox" value="ok" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Apakah anda ingin me-reset data pengeluaran ?
                        </label>
                    </div>

                    <input type="hidden" name="slug-a" value="<?= $dataPlanning['id']; ?>">
                <?php endif; ?>


                <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary" type="submit"><?= ($dataPlanning != null) ? 'Update Data' : 'Tambah Data' ?></button>
                </div>

            </div>
            <!-- Akhir rencana Pengeluaran -->

        </div>
    </form>
    <br>

</div>

<script src="/assets/js/planning.js"></script>

<?= $this->endSection(); ?>