$(document).ready(()=> {
    $('#id_sekolah').on('change', function(){
        const type = $(this).find('option:selected').data('type');
        
        if (type==2) {
            $('input.negeri').val(0);
            $('input.negeri').attr('readonly', true);
            $('.swasta').css('display', 'block');
        }
        else{
            $('input.negeri').val(0);
            $('input.negeri').attr('readonly', false);
            $('.swasta').css('display', 'none');
        }
    })

    $('.edit').on('click', function (evt){
        evt.preventDefault();

        let url = $('form').data('baseurl')+'/getDetailKuota';
        let id_kuota = $(this).data('id');
        let getZonasi = getJSON(url, {id_kuota});

        if (getZonasi.status=='success') {
            let { data } = getZonasi;
            let swasta = data[0].sisa_umum>0 ? true : false;
            $('#total').val(data[0].total);
            $('#zonasi').val(data[0].sisa_zonasi);
            $('#afirmasi').val(data[0].sisa_afirmasi);
            $('#pindahan').val(data[0].sisa_pindahan);
            $('#prestasi').val(data[0].sisa_prestasi);
            $('#umum').val(data[0].sisa_umum);


            if (swasta) {
                $('input.negeri').attr('readonly', true);
                $('.swasta').css('display', 'block');   
            }else {
                $('input.negeri').attr('readonly', false);
                $('.swasta').css('display', 'none');   
            }
            
            $('#id_sekolah').val(data[0].id_sekolah);
            $('#id_sekolah').selectpicker('refresh');
            

            let urlEdit = $('form').data('baseurl')+'/editkuota/'+id_kuota;
            $('form').attr('action', urlEdit);
            $('#exampleModal').modal('show');
        }
    })

    $('#simpan').on('click', function(evt){

        let zonasi = parseInt($('#zonasi').val());
        let afirmasi = parseInt($('#afirmasi').val());
        let pindahan = parseInt($('#pindahan').val());
        let prestasi = parseInt($('#prestasi').val());
        let kuota_in = parseInt($('#kuota_in').val());
        let umum     = parseInt($('#umum').val());
        let total = parseInt($('#total').val());

        let total_sisa = zonasi + afirmasi + pindahan + prestasi + kuota_in + umum;

        console.log(total_sisa)

        if (total !== total_sisa) {
            Swal.fire("Gagal!", "Pembagian kuota tidak sesuai dengan total kuota yang diterima!", "error");
            return null;
        }

        $('form').submit();
    })

    $('#exampleModal').on('hidden.bs.modal', function(){
        let tambahUrl = $('form').data('baseurl')+'/tambahkuota';
        $('form').attr('action', tambahUrl);
        $('input[type=text]').val(0);

        $('input.negeri').attr('readonly', false);
        $('.swasta').css('display', 'none');
    })

})