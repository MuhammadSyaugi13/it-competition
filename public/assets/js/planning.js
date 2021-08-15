const tambahPlanning = document.querySelector('.btnTambah');
const areaFormPlanning = document.querySelector('.areaPlanning');
let no = 1;

tambahPlanning.addEventListener('click', function () {
    areaFormPlanning.innerHTML += `
    <div class="input-perencanaan mt-4  ">

    <div class="input-group align-center pengeluaran-div mx-auto rounded-3">
        <input type="text" name="jenisRencana${no}" placeholder="Jenis Rencana Pengeluaran - ${no}" class="form-control pengeluaran text-center rounded-pill" id="pengeluaran">
    </div>
    
    <div id="emailHelp" class="form-text text-center">*We'll never share your email with anyone else.</div>
    <div class="input-group mt-2 pengeluaran-div mx-auto border-bottom border-3 pb-5">
        <input type="number" name="nominalPengeluaran${no}" placeholder="Nominal Maksimal Pengeluaran - ${no}" class="form-control pengeluaran text-center rounded-pill" id="pengeluaran">
    </div>
</div>
`;
    no++;

    if (no === 11) {
        tambahPlanning.setAttribute('disabled', '');
    }

});