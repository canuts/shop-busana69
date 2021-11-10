<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua request payment / konfirmasi pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Request payment</li>
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
                    <th>Invoice</th>
                    <th>Email</th>
                    <th>Nama lengkap</th>
                    <th>Rekening atas nama</th>
                    <th>Tujuan ke bank</th>
                    <th>Jumlah pembayaran</th>
                    <th>Tanggal pembayaran</th>
                    <th>Keterangan</th>
                    <th>Bukti gambar</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($payment->result() as $pay) : ?>
                    <?php 
                      if ($pay->status == '1') {
                        $status = '<span class="badge badge-success">Dikonfirmasi</span>';
                      } else {
                        $status = '<span class="badge badge-danger">Belum Dikonfirmasi</span>';
                      }
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pay->invoice; ?></td>
                    <td><?= $pay->email; ?></td>
                    <td><?= $pay->nama; ?></td>
                    <td><?= $pay->rekening; ?></td>
                    <td><?= $pay->ke_bank; ?></td>
                    <td>Rp <?= number_format($pay->jumlah, 0, ',', '.') ?></td>
                    <td><?= $pay->tanggal; ?></td>
                    <td><textarea class="form-control" readonly><?= $pay->keterangan; ?></textarea></td>
                    <td><img src="<?= base_url() ?>assets/img/bukti/<?= $pay->bukti_gambar ?>" style="width:100px;height:100px;"></td>
                    <td><?= $status; ?></td>
                    <td><?= $pay->date_created; ?></td>
                    <td><a href="#"><span class="fas fa-eye"></span></a> <a href="#editpay" data-id="<?= $pay->id ?>"><span class="fas fa-pencil-alt"></span></a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Invoice</th>
                    <th>Email</th>
                    <th>Nama lengkap</th>
                    <th>Rekening atas nama</th>
                    <th>Tujuan ke bank</th>
                    <th>Jumlah pembayaran</th>
                    <th>Tanggal pembayaran</th>
                    <th>Keterangan</th>
                    <th>Bukti gambar</th>
                    <th>Status</th>
                    <th>Date created</th>
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