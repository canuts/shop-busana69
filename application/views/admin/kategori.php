<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua Kategori & Subkategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori & Subkategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua kategori</h3>
              </div>

              <br>
              <div class="col-sm-2">
                <button type="button" data-target="#add-kategori" data-toggle="modal" class="btn btn-block btn-outline-info btn-sm">Tambah kategori</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama kategori</th>
                    <th>Id_kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($kategori->result() as $ka) : ?>
                    <?php 
                      if ($ka->is_active == '0') {
                        $status = '<span class="badge badge-danger">Tidak Aktif</span>';
                      } else {
                        $status = '<span class="badge badge-success">Aktif</span>';
                      }
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ka->nama_kategori; ?></td>
                    <td><?= $ka->kate; ?></td>
                    <td><?= $status; ?></td>
                    <td>
                      <a href="#deletekategori" data-id="<?= $ka->id ?>"><span class="fas fa-trash" aria-hidden="true"></span></a>
                      <a href="#editkate" data-id="<?= $ka->id ?>" data-nama="<?= $ka->nama_kategori; ?>" data-kate="<?= $ka->kate; ?>"><span class="fas fa-pencil-alt" aria-hidden="true"></span></a> 
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama kategori</th>
                    <th>Id_kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua subkategori</h3>
              </div>

              <br>
              <div class="col-sm-2">
                <button type="button" data-target="#add-subkategori" data-toggle="modal" class="btn btn-block btn-outline-info btn-sm">Tambah subkategori</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?= $this->session->flashdata('message') ?>
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama subkategori</th>
                    <th>Tittle thumbnail</th>
                    <th>Deskripsi</th>
                    <th>Type thumbnail</th>
                    <th>Id_kategori</th>
                    <th>Gambar subkategori</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $nu = 1; foreach($subkategori->result() as $su) : ?>
                    <?php 
                      if ($su->type == '1') {
                        $type = '<span class="badge badge-info">Thumb Slider</span>';
                      } else {
                        $type = '<span class="badge badge-warning">Thumb No Slider</span>';
                      }

                      if ($su->is_active == '0') {
                        $status = '<span class="badge badge-danger">Tidak Aktif</span>';
                      } else {
                        $status = '<span class="badge badge-success">Aktif</span>';
                      }
                     ?>
                  <tr>
                    <td><?= $nu++; ?></td>
                    <td><?= $su->nama; ?></td>
                    <td><?= $su->title; ?></td>
                    <td><textarea class="form-control" readonly><?= $su->desc; ?></textarea></td>
                    <td><?= $type; ?></td>
                    <td><?= $su->kate_id; ?></td>
                    <td><img src="<?= base_url() ?>assets/img/upload/<?= $su->gambar ?>" style="width:100px;height:100px;"></td>
                    <td><?= $status; ?></td>
                    <td><a href="#editsubkategori" data-id="<?= $su->id ?>" data-nama="<?= $su->nama; ?>" data-title="<?= $su->title; ?>" data-desc="<?= $su->desc; ?>" data-type="<?= $su->type ?>" data-kateid="<?= $su->kate_id; ?>" data-img="<?= $su->gambar ?>" data-status="<?= $su->is_active ?>"><span class="fas fa-pencil-alt" aria-hidden="true"></span></a> <a href="#deletesubkategori" data-id="<?= $su->id ?>"><span class="fas fa-trash" aria-hidden="true"></span></a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama subkategori</th>
                    <th>Tittle thumbnail</th>
                    <th>Deskripsi</th>
                    <th>Type thumbnail</th>
                    <th>Id_kategori</th>
                    <th>Gambar subkategori</th>
                    <th>Status</th>
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