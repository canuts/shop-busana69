<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark">Admin dashboard</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Dashboard</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <div class="content">

      <div class="container-fluid">

        <h5 class="mb-2">Info produk dan pebelian</h5>

        <div class="row">

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Total produk</span>

                <span class="info-box-number"><?= $count['produk']; ?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Total pelanggan</span>

                <span class="info-box-number"><?= $count['pelanggan']; ?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Produk terjual</span>

                <span class="info-box-number"><?= $count['produk_terjual']; ?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Transaksi pending</span>

                <span class="info-box-number"><?= $count['transaksi_pending']; ?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-6">

            <!-- TABLE: LATEST ORDERS -->

            <div class="card">

              <div class="card-header border-transparent">

                <h3 class="card-title">Transaksi terakhir</h3>



                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">

                    <i class="fas fa-times"></i>

                  </button>

                </div>

              </div>

              <!-- /.card-header -->

              <div class="card-body p-0">

                <div class="table-responsive">

                  <table class="table m-0">

                    <thead>

                    <tr>

                      <th>Order ID</th>

                      <th>Pelanggan</th>

                      <th>Status</th>

                      <th>Date</th>

                    </tr>

                    </thead>

                    <tbody>

                      <?php foreach($transaksi->result() as $data) : ?>

                        <?php $badge = ($data->status == '0') ? 'danger' : 'success'; 

                        $get_status = ($badge == 'danger') ? 'BELUM DIBAYAR' : 'DIBAYAR';

                        $get_pelanggan = $this->db->get_where('detail_pelanggan', ['id' => $data->id_pelanggan])->row();

                        ?>

                    <tr>

                      <td><a href="<?= base_url() ?>admin/invoice/<?= $data->order_id; ?>"><?= $data->order_id; ?></a></td>

                      <td><?= $get_pelanggan->nama_lengkap; ?></td>

                      <td><span class="badge badge-<?= $badge ?>"><?= $get_status; ?></span></td>

                      <td>

                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?= $data->date_created; ?></div>

                      </td>

                    </tr>

                  <?php endforeach; ?>

                    

                    </tbody>

                  </table>

                </div>

                <!-- /.table-responsive -->

              </div>

              <!-- /.card-body -->

              <div class="card-footer clearfix">

                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>

                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>

              </div>

              <!-- /.card-footer -->

            </div>

            <!-- /.card -->

          </div>

            <!-- PRODUCT LIST -->

            <div class="col-md-6">

            <div class="card">

              <div class="card-header">

                <h3 class="card-title">Produk terbaru</h3>



                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">

                    <i class="fas fa-times"></i>

                  </button>

                </div>

              </div>

              <!-- /.card-header -->

              <div class="card-body p-0">

                <ul class="products-list product-list-in-card pl-2 pr-2">

                  <?php foreach($produk->result() as $pdk) : ?>

                  <li class="item">

                    <div class="product-img">

                      <img src="<?= base_url() ?>assets/img/upload/<?= oneImage($pdk->gambar) ?>" alt="Product Image" class="img-size-50">

                    </div>

                    <div class="product-info">

                      <a href="javascript:void(0)" class="product-title"><?= $pdk->nama; ?>

                        <span class="badge badge-warning float-right">Rp<?= number_format($pdk->price, 0, ',', '.') ?></span></a>

                      <span class="product-description">

                        <?= repString($pdk->desc, 50) ?>

                      </span>

                    </div>

                  </li>

                <?php endforeach; ?>

                  <!-- /.item -->

                </ul>

              </div>

              <!-- /.card-body -->

              <div class="card-footer text-center">

                <a href="javascript:void(0)" class="uppercase">View All Products</a>

              </div>

              <!-- /.card-footer -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col-->

        </div>

        <!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->