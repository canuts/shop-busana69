<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua email yang berlangganan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Newsletter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example5" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($newsletter->result() as $new) : ?>
                    <?php 
                      if ($new->status == '1') {
                        $status = '<span class="badge badge-success">Aktif</span>';
                      } else {
                        $status = '<span class="badge badge-danger">Tidak Aktif</span>';
                      }

                      if ($new->id_pelanggan == 0) {
                        $pelanggan = '<span class="badge badge-info">DariWeb</span>';
                      } else {
                        $cek = $this->db->get_where('detail_pelanggan', ['id' => $new->id_pelanggan])->row();
                        $pelanggan = '<span class="badge badge-success">'.$cek->nama_lengkap.'</span>';
                      }
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pelanggan; ?></td>
                    <td><?= $new->email; ?></td>
                    <td><?= $status; ?></td>
                    <td><a href="#"><span class="fas fa-eye"></span></a> <a href="#"><span class="fas fa-pencil-alt"></span></a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Email</th>
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