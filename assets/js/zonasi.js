$(document).ready(()=> {

    $('#wilayah').on('change', function(evt){
        let url = $(this).data('url');
        let kode_wilayah = this.value;
        let getDesa = getJSON(url, {kode_wilayah});

        if (getDesa.status == 'success') {
            let { data } = getDesa;
            let html = '<option value="">-- Pilih Desa -- </option>';
            data.forEach(item => {
                html += `<option value='${item.id_desa}'>
                            ${item.nama_desa}
                        </option>`
            });

            $('#desa').html(html);
            $('#desa').selectpicker('refresh');
        }
    });

    $('.edit').on('click', function (evt){
        evt.preventDefault();

        let url = $('form').data('baseurl')+'getDetailZonasi';
        let id_zonasi = $(this).data('id');
        let getZonasi = getJSON(url, {id_zonasi});

        if (getZonasi.status=='success') {
            let {data, kecamatan, desa} = getZonasi;

            let dataKecamatan = '<option value="">-- Pilih Kecamatan -- </option>';
            kecamatan.forEach(item => {
                dataKecamatan += `<option value='${item.kode_wilayah}'>
                            ${item.nama_wilayah}
                        </option>`
            });
            $('#wilayah').html(dataKecamatan);
            
            let dataDesa = '<option value="">-- Pilih Desa -- </option>';
            desa.forEach(item => {
                if (item.id_desa === data.id_desa) {
                    $('#wilayah').val(item.kode_wilayah);    
                }

                dataDesa += `<option value='${item.id_desa}'>
                            ${item.nama_desa}
                        </option>`
            });
            $('#desa').html(dataDesa);
            $('#desa').val(data.id_desa);
            

            let urlEdit = $('form').data('baseurl')+'editzonasi/'+id_zonasi;
            $('form').attr('action', urlEdit);
            $('#wilayah').selectpicker('refresh').trigger('change');
            $('#desa').selectpicker('refresh').trigger('change');
            $('#exampleModal').modal('show');
        }
    })

    $('#exampleModal').on('hidden.bs.modal', function(){
        let tambahUrl = $('form').data('baseurl')+'tambahzonasi';
        $('form').attr('action', tambahUrl);
    })

})