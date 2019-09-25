$(document).ready(function() {
    // Data yang ditamilkan pada autocomplete.

   var local = window.location.origin+'/ci/sipnbapas/';
   var url = local+"ajx_detail_napi";
   $.ajax({
        url:url,
        type : 'ajax',
        dataType:'json',
        success:function (response) {
            var hasil = [];
            for(var i = 0;i<response.length;i++){
                hasil[i] = response[i].id_napi+"- ("+response[i].nama+")";
            }
            $( "#id_napi" ).autocomplete({
                source:hasil
            });
        },
        error:function () {

        }

    });
});

$(document).ready(function() {
    var local = window.location.origin+'/ci/sipnbapas/';
    var url = local+"riwayatbimbingan";
    $('#exampleModal').on('show.bs.modal', function (event) {
        var recipient = $(event.relatedTarget) .data('isi');
        var nama_penjamin = $(event.relatedTarget) .data('nama');

        $.ajax({
            url : url,
            type : 'ajax',
            dataType:'json',
            method:'POST',
            async:true,
            data : {"id_penjamin":recipient},
            success:function (response) {

                var data = "";
                if (response.id_penjamin!='gagal'){
                    for(var i =0 ; i<response.length;i++){
                        data += "<tr>" +
                            "<td>"+(i+1)+"</td>" +
                            "<td>"+nama_penjamin+"</td>" +
                            "<td>"+response[i].nama+"</td>" +
                            "<td>"+response[i].tgl_surat+"</td>" +
                            "<td>"+response[i].bimbingan_keterangan+"</td>" +
                            "</tr>";
                    }
                }
                else{
                    data += "<tr>" +
                        "<td colspan='5'><p align='center'>Belum Ada</p></td>"+
                        "</tr>";
                }
                    $('#cetak').html("<a title=\"Cetak\" class=\"btn btn-primary\" href=\"BimbinganController/cetak_riwayat/"+recipient+"\"> <span class=\"glyphicon glyphicon-print\">Cetak</span></a>");
                    $('#status').html(""+"Status Pembebasan : <a class = 'btn btn-success' type=\"button\" href=\"NapiController/keteranganNapi/"+recipient+"\">Belum di Tentukan</a>")
                    $('.tb_bimbingan').html(""+data);
                    $('#btnBb').html("<a class = 'btn btn-success' type=\"button\" href=\"BimbinganController/tambah/"+recipient+"\">Tambah Bimbingan</a>");



            },
            error:function (data) {
            }

        });
    });
});


$(document).ready(function () {
    var local = window.location.origin+'/ci/sipnbapas/';
    $("#btnCari").click(function () {
        var no_surat = $("#nosurat").val();
        var tgl_surat = $("#tglsurat").val();
        var url = local+"ajx_pengantar";
        console.log(url);
        var data = '';
        $.ajax({
           url : url,
           type : 'ajax',
            dataType:'json',
            method:'POST',
            async:true,
            data : {"id_bimbingan":no_surat},
            success:function (response) {
               console.log(response.id_penjamin);
               var keterangan;
               if (response.id_penjamin == 'gagal'){
                    data = "<span class='login100-form-title'>Data Tidak Tersedia</span>"
               }
               else{
                   if (response[0].keterangan != null){
                       keterangan = response[0].keterangan;
                   }
                   else{
                       keterangan = "Belum ada Keterangan Pembebasan";
                   }
                   data ="<span class=\"login100-form-title\">\n" +
                       "\t\t\t\t\t\tBiodata Narapidana\n" +
                       "\t\t\t\t\t</span>" +
                       "<img class='tengah' alt='Tidak ada gambar' src="+local+response[0].fotoktp+">" +
                       "<table class=\"wrap-input100\">\n" +
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Nama</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].nama+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Nomor KTP</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].noktp+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Tempat/Tanggal Lahir</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].tempat_lahir+', '+response[0].tgl_lahir+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Jenis Kelamin</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].jenis_kelamin+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Agama</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].agama+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Alamat</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].alamat+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Tanggal Masuk Penjara</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].tgl_masuk+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Perkara</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].perkara+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Hukuman</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+response[0].hukuman+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                    <tr>\n" +
                       "                        <td><label class=\"label\"><a>Keterangan</a></label></td>\n" +
                       "                        <td>:</td>\n" +
                       "                        <td><label class=\"label\"><a>"+keterangan+"</a></label>" +
                       "                        </td>" +
                       "                    </tr>"+
                       "                </table>\n" +
                       "\n" +
                       "                <div class=\"container-login100-form-btn\">\n" +
                       "                    <table width=\"100%\">\n" +
                       "                        <tr>\n"+
                       "                            <td align=\"center\">\n" +
                       "                                <a href='"+local+"NapiController/keteranganNapi/"+response[0].id_napi+"' style=\"width: 80%\" class=\"btn btn-success\" name=\"submit\" type=\"submit\" value=\"submit\">\n" +
                       "                                    Tentukan Keterangan Pembebasan\n" +
                       "                                </a>\n" +
                       "                            </td>\n" +
                       "                        </tr>\n" +
                       "                    </table>\n";

               }
                $('#biodatanapi').html(data);

           },
            error:function (data) {
            }

        });
    });


})
