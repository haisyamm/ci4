<div class="container-fluid">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="card-header">Laporan</h2>
          </div>
        <div class="card-body">
        <form id="formLaporan">
        <div class="row">
        <!-- Header Form -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="form-group col-md-10">
                <label for="">Tanggal Awal</label>
                <input type="Date" class="form-control" name="tglawal" id="tglawal" placeholder="Click Here">
              </div>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
             <div class="form-group col-md-10">
                <label for="">Tanggal Akhir</label>
                <input type="Date" class="form-control" name="tglakhir" id="tglretur" placeholder="Click Here">
              </div>
        </div>
        <button type="button" class="btn btn-primary btn-block" id="btnUpdate">
                            <i class="fa fa-floppy-o"></i> Update
                        </button>
        </div>
        </form>
      </div>
      </div>
    </div>
     <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Hasil Laporan</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th>Alasan Retur</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblReport">

                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th>Alasan Retur</th>
                                                <th>Total</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
      </div>
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $('#btnUpdate').click(function(){
        var dataForm = $('#formLaporan').serialize();
        $.ajax({
        type  : 'POST',
        url   : '<?php echo site_url('Laporan/transaksi')?>',//Memanggil Controller/Function
        async : false,
        dataType : 'json',
        data : dataForm, 
        success:function(data){
              var html = '';
              var i;
              var no;
              for(i=0; i<data.length; i++){ //looping atau pengulangan
                no = i + 1;
                html += '<tr>'+
                    '<td>'+no+'</td>'+
                    '<td>'+data[i].id_retur+'</td>'+
                    '<td>'+data[i].tgl_retur+'</td>'+
                    '<td>'+data[i].jenis_retur+'</td>'+
                    '<td>'+data[i].alasan_retur+'</td>'+
                    '<td>'+data[i].total_retur+'</td>'+
                    '</tr>';
              } // akhir dari looping

              $('#tblReport').html(html); // mengirim data
            }      
    });
  });
});
</script>


