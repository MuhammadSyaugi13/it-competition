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

    <form action="" method="POST">
        <div class="container-form rounded-3 ">
            <!-- bulan -->
            <div class="my-3 p-2 pemasukan mx-auto">
                <h4 class="text-center ">Bulan</h4>
                <div class="input-group  my-3 mx-0">
                    <!-- <span class="input-group-text">5.000.000</span> -->
                    <!-- <input type="number" name="pemasukan" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan"> -->

                    <select class="form-select form-control pemasukan rounded-pill text-center" name="bulan">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
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
                    <input type="number" name="pemasukan" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan">
                </div>
                <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
            </div>
            <!-- rencana Pengeluaran -->
            <div class="m-5  border-2 p-2 rounded-3">

                <div class="areaPlanning">
                    <h4 class="text-center">Limit Pengeluaran Harian</h5>

                        <div class="input-group my-3  mx-0">
                            <!-- <span class="input-group-text">5.000.000</span> -->
                            <input type="number" name="limitPengeluaran" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan">
                        </div>
                        <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
                </div>
                <br><br>

                <!-- <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary btnTambah" type="button">+ Tambah Rencana Keuangan</button>
                </div> -->

                <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </div>

            </div>
            <!-- Akhir rencana Pengeluaran -->

        </div>
    </form>
    <br>

</div>

<script src="/assets/js/planning.js"></script>

<?= $this->endSection(); ?>