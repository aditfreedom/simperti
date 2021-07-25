$(document).ready(()=> {
    $('#form-finalisasi').on('submit', function(ev){
        ev.preventDefault();

        let data = $(this).serialize();
        let url = $(this).data('url');
        let sendData = getJSON(url, data);

        if (sendData.status!=='success') {
            return Swal.fire("Gagal!", "Kuota Penerimaan Sudah Habis!", "error");
        }

        Swal.fire("Berhasil!", "Berhasil Melakukan Finalisasi", "success");
        window.location.reload();
    })
})