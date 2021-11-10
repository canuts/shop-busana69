<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua ulasan pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ulasan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua ulasan</h3>
              </div>
              <br>
              <div class="col-sm-2">
                <button type="button" data-target="#tambah-ulasan" data-toggle="modal" class="btn btn-block btn-outline-info btn-sm">Tambah ulasan</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <table id="example6" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>SKU produk</th>
                    <th>Order id</th>
                    <th>Nama</th>
                    <th>Rating</th>
                    <th>Pesan ulasan</th>
                    <th>Gambar</th>
                    <th>Date created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($ulasan->result() as $data) : ?>
                    <?php $produk = $this->db->get_where('produk', ['sku_produk' => $data->sku_produk])->row(); ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data->sku_produk; ?></td>
                    <td><?= $data->order_id; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->rate; ?></td>
                    <td><textarea class="form-control" readonly><?= $data->pesan; ?></textarea></td>
                    <?php if($data->gambar == '') : ?>
                      <td>Tidak ada gambar</td>
                    <?php else : ?>
                      <td><img src="<?= base_url() ?>assets/img/rating/<?= $data->gambar ?>" width="60" height="60"></td>
                    <?php endif; ?>
                    <td><?= $data->date_created; ?></td>
                    <td><a href="#editul" data-id="<?= $data->id ?>" data-sku="<?= $data->sku_produk ?>" data-orderid="<?= $data->order_id ?>" data-nama="<?= $data->nama ?>" data-rating="<?= $data->rate ?>" data-pesan="<?= $data->pesan ?>" data-gambar="<?= $data->gambar ?>" data-waktu="<?= $data->date_created ?>"><span class="fas fa-pencil-alt"></span></a> <a href="#hapusul" data-id="<?= $data->id ?>"><span class="fas fa-trash"></span></a> <a href="<?= base_url() ?>produk/<?= $produk->slug ?>"><span class="fas fa-eye"></span></a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>SKU produk</th>
                    <th>Order id</th>
                    <th>Nama</th>
                    <th>Rating</th>
                    <th>Pesan ulasan</th>
                    <th>Gambar</th>
                    <th>Date created</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-body">
                <table id="example7" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Sku produk</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($ulasancount->result() as $dt) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt->sku_produk; ?></td>
                    <td><?= $dt->total; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Sku produk</th>
                    <th>Total</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->