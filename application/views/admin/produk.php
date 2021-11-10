<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Semua produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua produk</h3>
              </div>
              <br>
              <div class="col-sm-2">
                <button type="button" data-target="#add-produk" data-toggle="modal" class="btn btn-block btn-outline-info btn-sm">Tambah produk</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Deskripsi</th>
                    <th>Sku Produk</th>
                    <th>Diskon</th>
                    <th>Expired diskon</th>
                    <th>Warna</th>
                    <th>Size</th>
                    <th>Berat</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Dilihat</th>
                    <th>Review</th>
                    <th>Gambar</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; foreach($produk->result() as $dt) : ?>
                    <?php 
                        if ($dt->is_diskon == '0') {
                          $hasil_diskon = 'No Diskon';
                        } else {
                          $hasil_diskon = $dt->is_diskon . '%';
                        }
 
                        $active = ($dt->is_active == '0') ? 'Nonaktif' : 'Aktif';
                        $label = ($dt->is_active == '0') ? 'danger' : 'success';
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt->slug; ?></td>
                    <td><a href="<?= base_url() ?>produk/<?= $dt->slug ?>" target="_blank"><?= $dt->nama; ?></a></td>
                    <td>Rp <?= number_format($dt->price, 0, ',', '.') ?></td>
                    <td><textarea class="form-control" readonly><?= $dt->desc; ?></textarea></td>
                    <td><?= $dt->sku_produk; ?></td>
                    <td><?= $hasil_diskon; ?></td>
                    <td><?= $dt->expired; ?></td>
                    <td><?= $dt->warna; ?></td>
                    <td><?= $dt->size; ?></td>
                    <td><?= $dt->berat; ?> Gram</td>
                    <td><?= $dt->kategori; ?></td>
                    <td><span class="badge badge-<?= $label ?>"><?= $active; ?></span></td>
                    <td><?= $dt->terjual; ?></td>
                    <td><?= $dt->review; ?></td>
                    <td><img src="<?= base_url() ?>assets/img/upload/<?= oneImage($dt->gambar); ?>" style="width: 100px; height: 100px;"></td>
                    <td><?= $dt->thumb; ?></td>
                    <td>
                      <a href="<?= base_url() ?>produk/<?= $dt->slug ?>" target="_blank"><span class="fas fa-eye"></span></a>
                      <a href="#editproduk" data-idn="<?= $dt->id ?>"><span class="fas fa-pencil-alt"></span></a>
                      <a href="#deleteproduk" data-id="<?= $dt->id ?>"><span class="fas fa-trash"></span></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Deskripsi</th>
                    <th>Sku Produk</th>
                    <th>Diskon</th>
                    <th>Expired diskon</th>
                    <th>Warna</th>
                    <th>Size</th>
                    <th>Berat</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Dilihat</th>
                    <th>Review</th>
                    <th>Gambar</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->