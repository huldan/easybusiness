<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Nama_barang</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_nama_barang</label>
                    <input type="text" name="id_nama_barang" class="form-control" placeholder="" value="<?php echo $dataedit->id_nama_barang?>" readonly>
            </div>
	  <div class="form-group">
            <label>nama_barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $dataedit->nama_barang?>">
    </div>
	  <div class="form-group">
            <label>harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $dataedit->harga?>">
    </div>
	  <div class="form-group">
            <label>jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="<?php echo $dataedit->jumlah?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
