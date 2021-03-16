 
<div class="container-fluid dashboard-content ">
  <div class="row">

    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#FormModal"><span class="fa fa-plus"></span> Tambah Data</a></div>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Product</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stok</th>
              <th>Ket</th>
              <th colspan="2">Action</th>
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
    </main>
  </div>
</div>

     <!-- MODAL ADD di Ubah Menajadi FormModal pada id nya tujuannya agar form ini dapat digunakan untuk input dan update-->
            <form>
            <div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <!--  Paste disini -->
                        <input type="hidden" class="form-control" name="idproduct" id="idproduct" value="">
                      <div class="form-group col-md-7">
                      <label for="exampleInputEmail1">Nama Product</label>
                      <input type="text" class="form-control" name="namaproduct" id="namaproduct" aria-describedby="emailHelp" placeholder="Enter Name Product">
                    </div>
                    <div class="form-group col-md-7">
                      <label for="exampleInputEmail1">Harga Beli</label>
                      <input type="text" class="form-control" name="hargabeli" id="hargabeli" aria-describedby="emailHelp" placeholder="Enter Harga Beli">
                    </div>
                    <div class="form-group col-md-7">
                      <label for="exampleInputEmail1">Harga Jual</label>
                      <input type="text" class="form-control" name="hargajual" id="hargajual" aria-describedby="emailHelp" placeholder="Enter Harga Jual">
                    </div>
                    <div class="form-group col-md-7" >
                      <label for="satuan">Satuan</label>
                      <select class="form-control" id="satuan" name="satuan">
                        <option value="">Pilih</option>
                        <?php foreach($satuan as $row):?>
                           <option value="<?= $row->id_satuan;?>"><?= $row->name_satuan;?></option>
                                
                      <?php endforeach;?>
                       
                      </select>
                    </div>
                    <div class="form-group col-md-7">
                      <label for="exampleInputEmail1">Stock</label>
                      <input type="text" class="form-control" name="stock" id="stock" aria-describedby="emailHelp" placeholder="Enter Stock">
                    </div>
                    <div class="form-group col-md-7">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="textarea" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Enter Keterangan">
                    </div>
                  </div>
                  <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_close">Close</button>
                    <div id="divsave"><button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button></div>
                    <div id="divupdate"></div>

                    <!--Perhatikan divsave dan divupdate diatas
                      tujuannya agar ketika akan menggunakan form input button simpan dinamakan Save sedangkan untuk edit menjadi
                      button update
                      implementasi ada di java script di klik edit , btn_update dan btn_close-->
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

<!--MODAL DELETE ini untuk konfirmasi , agar ketika klik delete tidak langsung terhapus-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="idproduct_delete" id="idproduct_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->

<script type="text/javascript">
  $(document).ready(function(){
    
    show_product();  //memanggil function yang ada di bawah
    //
    //
    //artinya yang ada pada bagian ini untuk mengeksekusi fuction apapun
    //
    //
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
                '<td>'+data[i].beli_product+'</td>'+
                '<td>'+data[i].jual_product+'</td>'+
                '<td>'+data[i].stok_product+'</td>'+
                '<td>'+data[i].ket_product+'</td>'+
                '<td style="text-align:center;">'+
                  '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-idproduct="'+data[i].id_product+'">Edit</a>'+' '+
                  '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-idproduct="'+data[i].id_product+'">Delete</a>'+
                '</td>'+
                '</tr>';
          } // akhir dari looping

          $('#tblProduct').html(html); // mengirim data
        }      
      });
    }

    //Save product
    $('#btn_save').on('click',function(){
      var namaproduct = $('#namaproduct').val(); //deklarasi variabel $('#id yang digunakan pada textbox')
      var hargabeli = $('#hargabeli').val();
      var hargajual = $('#hargajual').val();
      var stock = $('#stock').val();
      var satuan = $('#satuan').val();
      var keterangan = $('#keterangan').val();
      $.ajax({
        type : "POST",
        url  : "<?php echo site_url('Product/save')?>", //Memanggil Controller/Function
        dataType : "JSON",
        data : {namaproduct:namaproduct , hargabeli:hargabeli , hargajual:hargajual , satuan:satuan , stock:stock , keterangan:keterangan}, // menampung seluruh variable menjadi array
        success: function(data){ // setelah di simpan sudah seharusnya textbox yang diisi menjadi kosong
          $('[name="namaproduct"]').val(""); // sehingga untuk mengosongkannya dengan cara berikut
          $('[name="hargabeli"]').val(""); //.val() untuk mengatur value yg ada di textbox
          $('[name="hargajual"]').val("");
          $('[name="satuan"]').val("");
          $('[name="stock"]').val("");
          $('[name="keterangan"]').val("");
          $('#FormModal').modal('hide');
          show_product(); // setelah disimpan tentunya harus di refresh di tampilkan kembali data terbaru 
          // maka function ini kembali di panggil
        }
      });
      return false;
    });

    //Edit Data
      $('#tblProduct').on('click','.item_edit',function(){
        var idproduct = $(this).data('idproduct');  // variabel ini diambil dari data yg ada pada tabel 
        // silahkan perhartikan pada attribut  data-idproduct="'+dataXXXXX data-idproduct harus sama dengan .data('idproduct')
        // data-idproduct sebagai pengirim dan  $(this).data('idproduct');  sebagai penerima
        var btnupdate = '<button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>'; 
        // deklarasi variable untuk menampilkan button Update
        $('#FormModal').modal('show'); //menampilkan formModal
        $('#divsave').html(""); // menyembunyikan button save
        $('#divupdate').html(btnupdate); // mengirim ke divupdate untuk di tampilkan
        $.ajax({
        type  : 'POST',
        url   : '<?php echo site_url('product/editProduct')?>', //Memanggil Controller/Function
        async : false,
        dataType : 'json',
        data : {idproduct:idproduct}, 
        success : function(data){ //maka akan didapatkan data dari hasil pemanggilan controller di parsing menjadi JSON
          $('[name="idproduct"]').val(data[0].id_product);
          $('[name="namaproduct"]').val(data[0].name_product);
          $('[name="hargabeli"]').val(data[0].beli_product);
          $('[name="hargajual"]').val(data[0].jual_product);
          $('[name="satuan"]').val(data[0].satuan_id);
          $('[name="stock"]').val(data[0].stok_product);
          $('[name="keterangan"]').val(data[0].ket_product);
        }      
        });
      });

      $('#btn_update').on('click',function(){
      var idproduct = $('#idproduct').val(); //mendeklarasikan data seperti pada button save
      var namaproduct = $('#namaproduct').val();
      var hargabeli = $('#hargabeli').val();
      var hargajual = $('#hargajual').val();
      var stock = $('#stock').val();
      var satuan = $('#satuan').val();
      var keterangan = $('#keterangan').val();
      $('#divsave').html('<button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>'); 
      //setelah button update digunakan maka button update akan hilang dan diganti dengan button save
      $('#divupdate').html("");
      $.ajax({
        type : "POST",
        url  : "<?php echo site_url('Product/updateProduct')?>", // mengirim data yang di update
        dataType : "JSON",
        data : {idproduct:idproduct , namaproduct:namaproduct , hargabeli:hargabeli , hargajual:hargajual , satuan:satuan , stock:stock , keterangan:keterangan}, // data2 yang akan diupdate
        success: function(data){
          $('[name="idproduct"]').val(""); //dikosongkan kembali form nya
          $('[name="namaproduct"]').val("");
          $('[name="hargabeli"]').val("");
          $('[name="hargajual"]').val("");
          $('[name="satuan"]').val("");
          $('[name="stock"]').val("");
          $('[name="keterangan"]').val("");
          $('#FormModal').modal('hide');
          show_product(); // ditampilkan kembali data dengan memanggi functionnya
        }
      });
      return false;
    });

    $('#btn_close').on('click',function(){ //sudah di jelaskan sebelumnya diatas , maka pada form modal jika tidak mengisi form alias close maka tentu data semua harus kosong baik input ataupun update
      $('[name="idproduct"]').val("");
      $('[name="namaproduct"]').val("");
      $('[name="hargabeli"]').val("");
      $('[name="hargajual"]').val("");
      $('[name="satuan"]').val("");
      $('[name="stock"]').val("");
      $('[name="keterangan"]').val("");
      $('#FormModal').modal('hide');
      $('#divsave').html('<button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>');
      $('#divupdate').html("");
        });

    $('#tblProduct').on('click','.item_delete',function(){
          var idproduct = $(this).data('idproduct'); // sama seperti edit hanya silahkan cek ke atas
         
        $('#Modal_Delete').modal('show'); //menampilkan modal delete atau pop up delete
        $('[name="idproduct_delete"]').val(idproduct);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
          var idproduct = $('#idproduct_delete').val(); //deklarasi
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('Product/delete')?>", //memanggil contrroller/function
            dataType : "JSON", 
            data : {idproduct:idproduct}, //data yang dikirim untuk menghapus
            success: function(data){
              $('[name="idproduct"]').val(""); 
              $('#Modal_Delete').modal('hide');
              show_product(); // setelah di hapus pastinya ditampilkan kembali data yang terbaru
            }
          });
          return false;
        });

      });

</script>