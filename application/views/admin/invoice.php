<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Busana 69
                    <small class="float-right">Date: <?= $detail_id->date_created; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Alamat lengkap
                  <address>
                    <strong><?= $pelanggan->nama_lengkap; ?></strong><br>
                    <?= $pelanggan->alamat_lengkap; ?><br>
                    Whatsapp: <?= $pelanggan->whatsapp; ?><br>
                    Email: <?= $pelanggan->email; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Alamat pengiriman
                  <address>
                    <strong><?= $pelanggan->nama_lengkap; ?></strong><br>
                    <?= $pelanggan->is_pengiriman; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?= $detail_id->order_id; ?></b><br>
                  <br>
                  <b>Noresi:</b> <?= $detail_id->noresi ?><br>
                  <b>Status:</b> <?= status($detail_id->status) ?><br>
                  <b>Kurir:</b> <?= $detail_id->courier; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Produk</th>
                      <th>Variasi</th>
                      <th>Sku produk</th>
                      <th>Deskripsi</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($produk->result() as $data) : ?>
                        <?php 
                          $desc = $this->db->get_where('produk', ['sku_produk' => $data->sku_produk])->row();
                         ?>
                    <tr>
                      <td><?= $data->qty; ?></td>
                      <td><?= $data->produk; ?></td>
                      <td><?= $data->variasi; ?></td>
                      <td><?= $data->sku_produk; ?></td>
                      <td><?= repString($desc->desc, 140); ?></td>
                      <td>Rp <?= number_format($data->harga, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Pembayaran :</p>
                  <?php if($detail_id->is_bank == 'BRI') : ?>
                    <img src="<?= base_url() ?>assets/img/upload/bri_kecil.png" alt="bri">
                  <?php elseif($detail_id->is_bank == 'BNI') : ?>
                    <img src="<?= base_url() ?>assets/img/upload/bni_kecil.png" alt="bni">
                  <?php elseif($detail_id->is_bank == 'MANDIRI') : ?>
                    <img src="<?= base_url() ?>assets/img/upload/mandiri_kecil.png" alt="mandiri">
                  <?php elseif($detail_id->is_bank == 'BCA') : ?>
                    <img src="<?= base_url() ?>assets/img/upload/bca_kecil.png" alt="bca">
                <?php endif; ?>

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp <?= number_format($subtotal->harga, 0, ',', '.') ?></td>
                      </tr>
                      
                      <tr>
                        <th>Shipping:</th>
                        <td>Rp <?= number_format($detail_id->shipping, 0, ',', '.') ?></td>
                      </tr>
                      <tr>
                        <th>Total + Shipping:</th>
                        <td>Rp <?= number_format($detail_id->total, 0, ',', '.') ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->