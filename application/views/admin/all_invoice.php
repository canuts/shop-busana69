<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Semua invoice</li>
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
                <h3 class="card-title">Semua transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>OrderId</th>
                    <th>Pelanggan</th>
                    <th>Payment</th>
                    <th>IsBank</th>
                    <th>Kurir</th>
                    <th>Alamat pengiriman</th>
                    <th>Total pengiriman</th>
                    <th>No resi</th>
                    <th>Total + Shipping</th>
                    <th>Date created</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($invoice->result() as $data) : ?>
                    <?php 
                      $nama = $this->db->get_where('detail_pelanggan', ['id' => $data->id_pelanggan])->row();
                      $label = ($data->status == '0') ? 'danger' : 'success';
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>#<?= $data->order_id; ?></td>
                    <td><?= $nama->nama_lengkap; ?></td>
                    <td><?= $data->payment; ?></td>
                    <td><?= $data->is_bank; ?></td>
                    <td><?= $data->courier; ?></td>
                    <td><?= $data->shipping_addres; ?></td>
                    <td>Rp <?= number_format($data->shipping, 0, ',', '.'); ?></td>
                    <td><?= $data->noresi; ?></td>
                    <td>Rp <?= number_format($data->total, 0, ',', '.'); ?></td>
                    <td><?= $data->date_created; ?></td>
                    <td><i class="badge badge-<?= $label ?>"><?= status($data->status); ?></i></td>
                    <td><a href="<?= base_url() ?>admin/invoice/<?= $data->order_id ?>"><span class="fas fa-eye" aria-hidden="true"></span></a> 

                      <a href="#editinvoice" data-orderid="<?= $data->order_id ?>" data-nama="<?= $data->id_pelanggan; ?>" data-payment="<?= $data->payment; ?>" data-isbank="<?= $data->is_bank; ?>" data-courier="<?= $data->courier; ?>" data-shippingaddres="<?= $data->shipping_addres; ?>" data-shippingtotal="<?= $data->shipping ?>" data-noresi="<?= $data->noresi; ?>" data-total="<?= $data->total ?>" data-date="<?= $data->date_created; ?>"><span class="fas fa-pencil-alt" aria-hidden="true"></span></a>

                     <a href="#deleteinvoice" data-orderid="<?= $data->order_id ?>" class="deleteinvoice"><span class="fas fa-trash" aria-hidden="true"></span></a></td>

                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>OrderId</th>
                    <th>Pelanggan</th>
                    <th>Payment</th>
                    <th>IsBank</th>
                    <th>Kurir</th>
                    <th>Alamat pengiriman</th>
                    <th>Total pengiriman</th>
                    <th>No resi</th>
                    <th>Total + Shipping</th>
                    <th>Date created</th>
                    <th>Status</th>
                    <th>Action</th>
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