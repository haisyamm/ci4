<div class="container-fluid">
  <div class="row">
         <!-- MODAL ADD di Ubah Menajadi FormModal pada id nya tujuannya agar form ini dapat digunakan untuk input dan update-->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                  <div class="modal-body">
                        <!--  Paste disini -->
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Product</th>
                                  <th>Harga</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody id="tblProduct">
                               <!--  disini nanti akan muncul tabel yang dikirim dari coding ajax pada javascript
                                sehingga tbody di berikan ID agar tidak salah saat pengiriman data 
                              sama seperti primarykey agar tidak salah alamat
                              -->
                              </tbody>
                            </table>
                          </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_close">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <!--END MODAL ADD-->

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="card-header">Retur Product</h2>
          </div>
        <div class="card-body">
        <div class="row"> <!-- Header Form -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="form-group col-md-10">
            <label for="">Kode Customer / Gudang</label>
            <input type="text" class="form-control" name="idcustomer" id="idcustomer" disabled>
          </div>
          <div class="form-group col-md-10">
            <label for="">Nama Customer / Gudang</label>
            <input type="text" class="form-control" name="namacustomer" id="namacustomer" placeholder="Click Here">
          </div>
         
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
             <div class="form-group col-md-10">
                <label for="">Tanggal Retur</label>
                <input type="Date" class="form-control" name="tglretur" id="tglretur" placeholder="Click Here">
              </div>
              <div class="form-group  col-md-10">
                <br>
                <button id="addProduct" class="btn btn-default pull-left"><i class="fa fa-plus fa-fw"></i> Add Product (F7)</button>
              </div>
        </div>
        

        <table class="table table-bordered" id="TabelTransaksi">
            <thead>
                <tr>
                    <th style="width:35px;">#</th>
                    <th style="width:210px;">Kode Barang</th>
                    <th>Nama Barang</th>
                    <th style="width:120px;">Harga</th>
                    <th style="width:75px;">Qty</th>
                    <th style="width:125px;">Sub Total</th>
                    <th style="width:40px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>
        <div class="row">
        <div class="col-sm-7">
            <textarea name="catatan" id="catatan" class="form-control" rows="2" placeholder="Catatan Transaksi (Jika Ada)" style="resize: vertical; width:83%;"></textarea>
            
            <br />
            <p><i class="fa fa-keyboard-o fa-fw"></i> <b>Shortcut Keyboard : </b></p>
            <div class="row">
                <div class="col-sm-6">F7 = Tambah baris baru</div>
                <div class="col-sm-6">F9 = Cetak Struk</div>
                <div class="col-sm-6">F8 = Fokus ke field bayar</div>
                <div class="col-sm-6">F10 = Simpan Transaksi</div>
            </div> 
        </div>
        <div class="col-sm-5">
            <div class="form-horizontal">
                <div class="form-group col-md-10">
                        <label for="disc">Discount</label>
                        <input type="text" class="form-control" name="namaproduct" id="namaproduct" placeholder="Enter Discount">
                      </div>
                      <div class="form-group col-md-10">
                        <label for="">Grand Total</label>
                        <input type="text" class="form-control" name="Grand Total" id="grandtotal" disabled>
                      </div>
                      <div class="form-group  col-md-10" >
                            <label for="UangCash">Bayar</label>
                                <input type="text" name="cash" id="UangCash" class="form-control" onkeypress="return check_int(event)">
                        </div>
                        <div class="form-group  col-md-10">
                            <label for="UangKembali">Kembali</label>
                                <input type="text" id="UangKembali" class="form-control" disabled>
                        </div>
                <div class="row">

                    <div class="col-sm-6" style="padding-right: 0px;">
                        <button type="button" class="btn btn-warning btn-block" id="CetakStruk">
                            <i class="fa fa-print"></i> Cetak (F9)
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-block" id="Simpann">
                            <i class="fa fa-floppy-o"></i> Simpan (F10)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      </div>
    </div>
    </div>
</div>

<script type="text/javascript">
function setValue(a,b,c){
    ada=false;
    for(i=1;i<=d;i++){
        if(
            (a==document.getElementById("iproduct"+i).value) && 
            (i!==d) && 
            (e==document.getElementById("motif"+i).value)
          ){
            alert ("kode : "+a+" sudah ada !!!!!");
            ada=true;
            break;
        }else{
            ada=false;
        }
    }
    if(!ada){
          document.getElementById("iproduct"+d).value=a;
          document.getElementById("eproductname"+d).value=b;
          document.getElementById("vproductretail"+d).value=c;
          document.getElementById("motif"+d).value=e;
          document.getElementById("emotifname"+d).value=f;
          document.getElementById("iproductstatus"+d).value=g;
          jsDlgHide("#konten *", "#fade", "#light");
    }
}
    $(document).ready(function(){

    show_product();

    $('#id_pelanggan').change(function(){
        if($(this).val() !== '')
        {
            $.ajax({
                url: "<?php echo site_url('penjualan/ajax-pelanggan'); ?>",
                type: "POST",
                cache: false,
                data: "id_pelanggan="+$(this).val(),
                dataType:'json',
                success: function(json){
                    $('#telp_pelanggan').html(json.telp);
                    $('#alamat_pelanggan').html(json.alamat);
                    $('#info_tambahan_pelanggan').html(json.info_tambahan);
                }
            });
        }
        else
        {
            $('#telp_pelanggan').html('<small><i>Tidak ada</i></small>');
            $('#alamat_pelanggan').html('<small><i>Tidak ada</i></small>');
            $('#info_tambahan_pelanggan').html('<small><i>Tidak ada</i></small>');
        }
    });

    $('#addProduct').click(function(){
  
        $('#productModal').modal('show');

    });

    $("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();

});

function show_product(){ //untuk menampilkan data product
      $.ajax({
        type  : 'GET',
        url   : '<?php echo site_url('product/getProduct')?>', //Memanggil Controller/Function
        async : false,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          var no;
          for(i=0; i<data.length; i++){ //looping atau pengulangan
            no = i + 1;
            html += '<tr>'+
                '<td>'+no+'</td>'+
                '<td>'+data[i].name_product+'</td>'+
                '<td>'+data[i].jual_product+'</td>'+
                '<td><a href="#"class="btn btn-sm btn-success"><i class="fa fa-check"></i> Choose</a></td>'+
                '</tr>';
          } // akhir dari looping

          $('#tblProduct').html(html); // mengirim data
        }      
      });
    }

function BarisBaru()
{
    var Nomor = $('#TabelTransaksi tbody tr').length + 1;
    var Baris = "<tr>";
        Baris += "<td>"+Nomor+"</td>";
        Baris += "<td>";
            Baris += "<input type='text' class='form-control' name='idproduct' id='idproduct"+Nomor+"' disabled>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<input type='text' class='form-control' name='nameproduct' id='nameproduct"+Nomor+"' disabled>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<input type='text' class='form-control' name='harga"+Nomor+"' id='harga' disabled>";
        Baris += "</td>";
        Baris += "<td><input type='text' class='form-control' id='jumlah_beli' name='jumlah_beli[]' onkeypress='return check_int(event)' ></td>";
        Baris += "<td>";
            Baris += "<input type='hidden' name='sub_total[]'>";
            Baris += "<span></span>";
        Baris += "</td>";
        Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
        Baris += "</tr>";

    $('#TabelTransaksi tbody').append(Baris);

    $('#TabelTransaksi tbody tr').each(function(){
        $(this).find('td:nth-child(2) input').focus();
    });


    HitungTotalBayar();
}

$(document).on('click', '#HapusBaris', function(e){
    e.preventDefault();
    $(this).parent().parent().remove();

    var Nomor = 1;
    $('#TabelTransaksi tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
    });

    HitungTotalBayar();
});


function AutoCompleteGue(Lebar, KataKunci, Indexnya)
{
    $('div#hasil_pencarian').hide();
    var Lebar = Lebar + 25;

    var Registered = '';
    $('#TabelTransaksi tbody tr').each(function(){
        if(Indexnya !== $(this).index())
        {
            if($(this).find('td:nth-child(2) input').val() !== '')
            {
                Registered += $(this).find('td:nth-child(2) input').val() + ',';
            }
        }
    });

    if(Registered !== ''){
        Registered = Registered.replace(/,\s*$/,"");
    }

    $.ajax({
        url: "<?php echo site_url('penjualan/ajax-kode'); ?>",
        type: "POST",
        cache: false,
        data:'keyword=' + KataKunci + '&registered=' + Registered,
        dataType:'json',
        success: function(json){
            if(json.status == 1)
            {
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').css({ 'width' : Lebar+'px' });
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
            }
            if(json.status == 0)
            {
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3)').html('');
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val('');
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html('');
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').prop('disabled', true).val('');
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(0);
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html('');
            }
        }
    });

    HitungTotalBayar();
}

$(document).on('keyup', '#pencarian_kode', function(e){
    if($(this).val() !== '')
    {
        var charCode = e.which || e.keyCode;
        if(charCode == 40)
        {
            if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
            {
                var Selanjutnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
                $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

                Selanjutnya.addClass('autocomplete_active');
            }
            else
            {
                $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
            }
        } 
        else if(charCode == 38)
        {
            if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
            {
                var Sebelumnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
                $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');
            
                Sebelumnya.addClass('autocomplete_active');
            }
            else
            {
                $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
            }
        }
        else if(charCode == 13)
        {
            var Field = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)');
            var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
            var Barangnya = Field.find('div#hasil_pencarian li.autocomplete_active span#barangnya').html();
            var Harganya = Field.find('div#hasil_pencarian li.autocomplete_active span#harganya').html();
            
            Field.find('div#hasil_pencarian').hide();
            Field.find('input').val(Kodenya);

            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(3)').html(Barangnya);
            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) input').val(Harganya);
            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) span').html(to_rupiah(Harganya));
            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').removeAttr('disabled').val(1);
            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) input').val(Harganya);
            $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) span').html(to_rupiah(Harganya));
            
            var IndexIni = $(this).parent().parent().index() + 1;
            var TotalIndex = $('#TabelTransaksi tbody tr').length;
            if(IndexIni == TotalIndex){
                BarisBaru();

                $('html, body').animate({ scrollTop: $(document).height() }, 0);
            }
            else {
                $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').focus();
            }
        }
        else 
        {
            AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
        }
    }
    else
    {
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian').hide();
    }

    HitungTotalBayar();
});

$(document).on('click', '#daftar-autocomplete li', function(){
    $(this).parent().parent().parent().find('input').val($(this).find('span#kodenya').html());
    
    var Indexnya = $(this).parent().parent().parent().parent().index();
    var NamaBarang = $(this).find('span#barangnya').html();
    var Harganya = $(this).find('span#harganya').html();

    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').hide();
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3)').html(NamaBarang);
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(Harganya);
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(to_rupiah(Harganya));
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').removeAttr('disabled').val(1);
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(Harganya);
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(Harganya));

    var IndexIni = Indexnya + 1;
    var TotalIndex = $('#TabelTransaksi tbody tr').length;
    if(IndexIni == TotalIndex){
        BarisBaru();
        $('html, body').animate({ scrollTop: $(document).height() }, 0);
    }
    else {
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').focus();
    }

    HitungTotalBayar();
});

$(document).on('keyup', '#jumlah_beli', function(){
    var Indexnya = $(this).parent().parent().index();
    var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val();
    var JumlahBeli = $(this).val();
    var KodeBarang = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2) input').val();

    $.ajax({
        url: "<?php echo site_url('barang/cek-stok'); ?>",
        type: "POST",
        cache: false,
        data: "kode_barang="+encodeURI(KodeBarang)+"&stok="+JumlahBeli,
        dataType:'json',
        success: function(data){
            if(data.status == 1)
            {
                var SubTotal = parseInt(Harga) * parseInt(JumlahBeli);
                if(SubTotal > 0){
                    var SubTotalVal = SubTotal;
                    SubTotal = to_rupiah(SubTotal);
                } else {
                    SubTotal = '';
                    var SubTotalVal = 0;
                }

                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(SubTotalVal);
                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(SubTotal);
                HitungTotalBayar();
            }
            if(data.status == 0)
            {
                $('.modal-dialog').removeClass('modal-lg');
                $('.modal-dialog').addClass('modal-sm');
                $('#ModalHeader').html('Oops !');
                $('#ModalContent').html(data.pesan);
                $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
                $('#ModalGue').modal('show');

                $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val('1');
            }
        }
    });
});

$(document).on('keydown', '#jumlah_beli', function(e){
    var charCode = e.which || e.keyCode;
    if(charCode == 9){
        var Indexnya = $(this).parent().parent().index() + 1;
        var TotalIndex = $('#TabelTransaksi tbody tr').length;
        if(Indexnya == TotalIndex){
            BarisBaru();
            return false;
        }
    }

    HitungTotalBayar();
});

$(document).on('keyup', '#UangCash', function(){
    HitungTotalKembalian();
});

function HitungTotalBayar()
{
    var Total = 0;
    $('#TabelTransaksi tbody tr').each(function(){
        if($(this).find('td:nth-child(6) input').val() > 0)
        {
            var SubTotal = $(this).find('td:nth-child(6) input').val();
            Total = parseInt(Total) + parseInt(SubTotal);
        }
    });

    $('#TotalBayar').html(to_rupiah(Total));
    $('#TotalBayarHidden').val(Total);

    $('#UangCash').val('');
    $('#UangKembali').val('');
}

function HitungTotalKembalian()
{
    var Cash = $('#UangCash').val();
    var TotalBayar = $('#TotalBayarHidden').val();

    if(parseInt(Cash) >= parseInt(TotalBayar)){
        var Selisih = parseInt(Cash) - parseInt(TotalBayar);
        $('#UangKembali').val(to_rupiah(Selisih));
    } else {
        $('#UangKembali').val('');
    }
}

function to_rupiah(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}

function check_int(evt) {
    var charCode = ( evt.which ) ? evt.which : event.keyCode;
    return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}

$(document).on('keydown', 'body', function(e){
    var charCode = ( e.which ) ? e.which : event.keyCode;

    if(charCode == 118) //F7
    {
        BarisBaru();
        return false;
    }

    if(charCode == 119) //F8
    {
        $('#UangCash').focus();
        return false;
    }

    if(charCode == 120) //F9
    {
        CetakStruk();
        return false;
    }

    if(charCode == 121) //F10
    {
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').addClass('modal-sm');
        $('#ModalHeader').html('Konfirmasi');
        $('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
        $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
        $('#ModalGue').modal('show');

        setTimeout(function(){ 
            $('button#SimpanTransaksi').focus();
        }, 500);

        return false;
    }
});

$(document).on('click', '#Simpann', function(){
    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').addClass('modal-sm');
    $('#ModalHeader').html('Konfirmasi');
    $('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
    $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
    $('#ModalGue').modal('show');

    setTimeout(function(){ 
        $('button#SimpanTransaksi').focus();
    }, 500);
});

$(document).on('click', 'button#SimpanTransaksi', function(){
    SimpanTransaksi();
});

$(document).on('click', 'button#CetakStruk', function(){
    CetakStruk();
});

function SimpanTransaksi()
{
    var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
    FormData += "&tanggal="+encodeURI($('#tanggal').val());
    FormData += "&id_kasir="+$('#id_kasir').val();
    FormData += "&id_pelanggan="+$('#id_pelanggan').val();
    FormData += "&" + $('#TabelTransaksi tbody input').serialize();
    FormData += "&cash="+$('#UangCash').val();
    FormData += "&catatan="+encodeURI($('#catatan').val());
    FormData += "&grand_total="+$('#TotalBayarHidden').val();

    $.ajax({
        url: "<?php echo site_url('penjualan/transaksi'); ?>",
        type: "POST",
        cache: false,
        data: FormData,
        dataType:'json',
        success: function(data){
            if(data.status == 1)
            {
                alert(data.pesan);
                window.location.href="<?php echo site_url('penjualan/transaksi'); ?>";
            }
            else 
            {
                $('.modal-dialog').removeClass('modal-lg');
                $('.modal-dialog').addClass('modal-sm');
                $('#ModalHeader').html('Oops !');
                $('#ModalContent').html(data.pesan);
                $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
                $('#ModalGue').modal('show');
            }   
        }
    });
}

$(document).on('click', '#TambahPelanggan', function(e){
    e.preventDefault();

    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').removeClass('modal-lg');
    $('#ModalHeader').html('Tambah Pelanggan');
    $('#ModalContent').load($(this).attr('href'));
    $('#ModalGue').modal('show');
});

function CetakStruk()
{
    if($('#TotalBayarHidden').val() > 0)
    {
        if($('#UangCash').val() !== '')
        {
            var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
            FormData += "&tanggal="+encodeURI($('#tanggal').val());
            FormData += "&id_kasir="+$('#id_kasir').val();
            FormData += "&id_pelanggan="+$('#id_pelanggan').val();
            FormData += "&" + $('#TabelTransaksi tbody input').serialize();
            FormData += "&cash="+$('#UangCash').val();
            FormData += "&catatan="+encodeURI($('#catatan').val());
            FormData += "&grand_total="+$('#TotalBayarHidden').val();

            window.open("<?php echo site_url('penjualan/transaksi-cetak/?'); ?>" + FormData,'_blank');
        }
        else
        {
            $('.modal-dialog').removeClass('modal-lg');
            $('.modal-dialog').addClass('modal-sm');
            $('#ModalHeader').html('Oops !');
            $('#ModalContent').html('Harap masukan Total Bayar');
            $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
            $('#ModalGue').modal('show');
        }
    }
    else
    {
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').addClass('modal-sm');
        $('#ModalHeader').html('Oops !');
        $('#ModalContent').html('Harap pilih barang terlebih dahulu');
        $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
        $('#ModalGue').modal('show');

    }
}
</script>