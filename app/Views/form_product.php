<body>
  
<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Input Produk</h1>
      </div>
   
        <form action="/product/save" method="post">
          <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Nama Product</label>
            <input type="text" class="form-control" name="namaproduct" id="namaproduct" aria-describedby="emailHelp" placeholder="Enter Name Product">
          </div>
          <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Harga Beli</label>
            <input type="text" class="form-control" name="hargabeli" id="hargabeli" aria-describedby="emailHelp" placeholder="Enter Harga Beli">
          </div>
          <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Harga Jual</label>
            <input type="text" class="form-control" name="hargajual" id="namaproduct" aria-describedby="emailHelp" placeholder="Enter Harga Jual">
          </div>
          <div class="form-group col-md-3" >
            <label for="satuan">Satuan</label>
            <select class="form-control" id="satuan" name="satuan">
              <option value="">Pilih</option>
              <?php foreach($satuan as $row):?>
                 <option value="<?= $row->id_satuan;?>"><?= $row->name_satuan;?></option>
                      
            <?php endforeach;?>
             
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" aria-describedby="emailHelp" placeholder="Enter Stock">
          </div>
          <div class="form-group col-md-7">
            <label for="exampleInputEmail1">Keterangan</label>
            <input type="textarea" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Enter Keterangan">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </main>
  </div>
</div>
</body>