<aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

    <div class="p-3">

      <h5>Title</h5>

      <p>Sidebar content</p>

    </div>

  </aside>

  <!-- /.control-sidebar -->



  <!-- Main Footer -->

  <footer class="main-footer">

    <!-- To the right -->

    <div class="float-right d-none d-sm-inline">

      <?= set('nama_site'); ?>

    </div>

    <!-- Default to the left -->

    <strong>Copyright &copy; 2019-2020 <a href="<?= set('url') ?>"><?= set('nama_site'); ?></a>.</strong> All rights reserved.

  </footer>

</div>

<!-- ./wrapper -->

<!-- Edit invoice -->

<div class="modal fade" id="edit-invoice">

        <div class="modal-dialog modal-dialog-scrollable">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Edit invoice</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <form id="forminvoice">

                <div id="notif"></div>

              <div class="form-group">

                <label for="orderid">OrderId</label>

                <input type="text" id="orderid" class="form-control" name="orderid" readonly>

              </div>



              <div class="form-group">

                <label for="pelanggan">pelanggan</label>

                <input type="text" id="pelanggan" name="pelanggan" class="form-control" readonly>

              </div>



              <div class="form-group">

                <label for="payment">payment</label>

                <input type="text" id="payment" name="payment" class="form-control">

              </div>



              <div class="form-group">

                <label for="isbank">isbank</label>

                <input type="text" id="isbank" name="isbank" class="form-control">

              </div>



              <div class="form-group">

                <label for="kurir">kurir</label>

                <input type="text" id="kurir" name="kurir" class="form-control">

              </div>



              <div class="form-group">

                <label for="shippingaddres">shippingAddress</label>

                <textarea name="shippingaddres" class="form-control" id="shippingaddres"></textarea>

              </div>



              <div class="form-group">

                <label for="shipping">shipping</label>

                <input type="number" id="shipping" name="shipping" class="form-control">

              </div>



              <div class="form-group">

                <label for="noresi">noresi</label>

                <input type="text" id="noresi" name="noresi" class="form-control">

              </div>



              <div class="form-group">

                <label for="total">total</label>

                <input type="number" id="total" name="total" class="form-control">

              </div>



              <div class="form-group">

                <label for="datecreated">datecreated</label>

                <input type="text" id="datecreated" name="datecreated" class="form-control">

              </div>



              <div class="form-group">

                <label for="status">status</label>

                <select name="status" id="status" class="form-control">

                  <option value="0">BELUM DIBAYAR</option>

                  <option value="1">DIBAYAR</option>

                </select>

              </div>

            </form>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="button" class="btn btn-primary" id="geteditinvoice">Edit invoice</button>

            </div>

          </div>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

<!-- /.Edit invoice -->



<!-- Tambah produk -->

<?php if($this->uri->segment(1) == 'all_produk') : ?>

<div class="modal fade" id="add-produk">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/addProduk" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Tambah produk</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              

              <div class="form-group">

                <label>Nama produk</label>

                <input type="text" class="form-control" name="nama" required>

              </div>



              <div class="form-group">

                <label>Harga produk</label>

                <input type="number" class="form-control" name="price" required>

              </div>



              <div class="form-group">

                <label>Deskripsi</label>

                <textarea name="desc" id="desc1" rows="10" cols="80" class="form-control"></textarea>

              </div>



              <div class="form-group">

                <label>Diskon produk</label>

                <small>Jika tidak ingin di diskon maka tetapkan ke 0</small>

                <input type="number" class="form-control" value="0" name="is_diskon" required>

              </div>



              <div class="form-group">

                <label>Expired diskon produk</label>

                <input type="text" class="form-control" placeholder="2020/07/10" name="expired">

              </div>



              <div class="form-group">

                <label>Warna produk</label>

                <input type="text" placeholder="hitam|putih" class="form-control" name="warna" required>

              </div>



              <div class="form-group">

                <label>Ukuran produk</label>

                <input type="text" placeholder="XL|L" class="form-control" name="size" required>

              </div>



              <div class="form-group">

                <label>Berat produk</label>

                <input type="number" placeholder="300" class="form-control" name="berat" required>

              </div>



              <div class="form-group">

                <label>Kategori produk</label>

                <select name="kategori" class="form-control">

                  <option value="" selected>Pilih kategori</option>

                  <?php foreach($subkategori->result() as $data) : ?>

                    <option value="<?= $data->nama ?>"><?= $data->nama ?></option>

                  <?php endforeach; ?>

                </select>

              </div>



              <div class="form-group">

                <label>Status produk</label>

                <select name="is_active" class="form-control">

                  <option value="1">Aktif</option>

                  <option value="0">Tidak Aktif</option>

                </select>

              </div>



              <div class="form-group" id="showgambar">

                <label>Gambar produk</label>

                <input type="file" class="form-control" name="gambar[]" multiple>

              </div>



              <div class="form-group">

                <label>Thumbnail produk</label>

                <input type="text" name="thumb_text" class="form-control" required>

              </div>



            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Tambah produk</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

    <?php endif; ?>

    <!-- /.tambah produk -->



    <!-- Edit produk -->

    <div class="modal fade" id="edit-produk">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/editProduk" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Edit produk</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body" id="isi-produk">

              

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Simpan perubahan</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

      <!-- /.Edit produk -->

      <!-- Tambah kategori -->

      <div class="modal fade" id="add-kategori">

        <div class="modal-dialog modal-dialog-scrollable">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Tambah kategori</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <form id="formkategori">

              <div class="form-group">

                <label>Nama kategori</label>

                <input type="text" name="nama_kategori" class="form-control">

              </div>



              <div class="form-group">

                <label>Id kategori</label>

                <input type="text" name="kate" class="form-control">

              </div>



              <div class="form-group">

                <label>Status kategori</label>

                <select name="status" class="form-control">

                  <option value="1">Aktif</option>

                  <option value="0">Tidak Aktif</option>

                </select>

              </div>

            </form>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="button" class="btn btn-primary" id="add-kategoribtn">Tambah</button>

            </div>

          </div>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

      <!-- ./Tambah kategori -->



      <div class="modal fade" id="update-kategori">

        <div class="modal-dialog modal-dialog-scrollable">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Update kategori</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <form id="formkategoriupdate">

                <input type="hidden" name="idnya1" class="form-control">

              <div class="form-group">

                <label>Nama kategori</label>

                <input type="text" name="edit_nama_kategori" class="form-control">

              </div>



              <div class="form-group">

                <label>Id kategori</label>

                <input type="text" name="edit_kate" class="form-control">

              </div>



              <div class="form-group">

                <label>Status kategori</label>

                <select name="edit_status" class="form-control">

                  <option value="1">Aktif</option>

                  <option value="0">Tidak Aktif</option>

                </select>

              </div>

            </form>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="button" class="btn btn-primary" id="update-kategoribtn">Update</button>

            </div>

          </div>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

      <!-- Edit kategori -->



      <!-- Tambah subkategori -->

      <div class="modal fade" id="add-subkategori">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/addSubkategori" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Tambah subkategori</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">



              <div class="form-group">

                <label>Nama subkategori</label>

                <input type="text" name="nama" class="form-control" required>

              </div>



              <div class="form-group">

                <label>Title subkategori</label>

                <input type="text" name="title" class="form-control" required>

              </div>



              <div class="form-group">

                <label>Deskripsi subkategori</label>

                <input type="text" name="desc" class="form-control" required>

              </div>



              <div class="form-group">

                <label>Thumbnail subkategori</label>

                <select class="form-control" name="type">

                  <option value="1">Slider</option>

                  <option value="2">No Slider</option>

                </select>

              </div>



              <?php $kat = $this->db->get_where('kategori', ['is_active' => '1']); ?>



              <div class="form-group">

                <label>Id kategori</label>

                <select class="form-control" name="kate_id">

                  <?php foreach($kat->result() as $inya) : ?>

                  <option value="<?= $inya->kate ?>"><?= $inya->kate ?></option>

                <?php endforeach; ?>

                </select>

              </div>



              <div class="form-group">

                <label>Gambar subkategori</label>

                <input type="file" name="gambar" class="form-control">

              </div>



              <div class="form-group">

                <label>Status subkategori</label>

                <select name="is_active" class="form-control">

                  <option value="1">Aktif</option>

                  <option value="0">Tidak Aktif</option>

                </select>

              </div>



            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Tambah</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

      <!-- ./Tambah subkategori -->



        <div class="modal fade" id="update-subkategori">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/editSubKategori" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Update subkategori</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <input type="hidden" name="editsub_id" class="form-control">

              <div class="form-group">

                <label>Nama subkategori</label>

                <input type="text" name="editsub_nama" class="form-control">

              </div>



              <div class="form-group">

                <label>Title subkategori</label>

                <input type="text" name="editsub_title" class="form-control">

              </div>



              <div class="form-group">

                <label>Deskripsi subkategori</label>

                <textarea name="editsub_desc" class="form-control"></textarea>

              </div>



              <div class="form-group">

                <label>Thumbnail subkategori</label>

                <select class="form-control" name="editsub_type">

                  <option value="1">Slider</option>

                  <option value="2">No Slider</option>

                </select>

              </div>



              <?php $kat = $this->db->get_where('kategori', ['is_active' => '1']); ?>



              <div class="form-group">

                <label>Id kategori</label>

                <select class="form-control" name="editsub_kate_id">

                  <?php foreach($kat->result() as $inya) : ?>

                  <option value="<?= $inya->kate ?>"><?= $inya->kate ?></option>

                <?php endforeach; ?>

                </select>

              </div>



              <div id="gmbsub"></div>



              <div class="form-group">

                <label>Edit gambar subkategori</label>

                <input type="file" name="editsub_gambar" class="form-control">

              </div>



              <div class="form-group">

                <label>Status subkategori</label>

                <select name="editsub_is_active" class="form-control">

                  <option value="1">Aktif</option>

                  <option value="0">Tidak Aktif</option>

                </select>

              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Update</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>

      <!-- Edit ulasan -->

    <div class="modal fade" id="edit-ulasan">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/editUlasan" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Edit ulasan</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Id ulasan</label>
                <input type="text" name="id_ulasan" class="form-control" readonly>
              </div>

              <div class="form-group">
                <label>Sku produk</label>
                <input type="text" name="sku_produk_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Order id</label>
                <input type="text" name="order_id_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Rating produk</label>
                <input type="number" name="rating_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Pesan ulasan</label>
                <textarea name="pesan_ulasan" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label>Gambar</label>
                <img id="gambar_ulasan" width="60" height="60">
              </div>
              <div class="form-group">
                <label>Ubah gambar</label>
                <input type="file" name="ubah_gambar_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Date created</label>
                <input type="text" name="date_ulasan" class="form-control">
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Simpan perubahan</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>


<!-- tambah ulasan -->

    <div class="modal fade" id="tambah-ulasan">

        <div class="modal-dialog modal-dialog-scrollable">

          <form action="<?= base_url() ?>ajax/tambahUlasan" method="post" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">

              <h4 class="modal-title">Tambah ulasan</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Sku produk</label>
                <input type="text" name="add_sku_ulasan" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Order id</label>
                <input type="text" name="add_orderid_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="add_nama_ulasan" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Rating produk</label>
                <input type="number" placeholder="1-5" name="add_rating_ulasan" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Pesan ulasan</label>
                <textarea name="add_pesan_ulasan" class="form-control" required></textarea>
              </div>

              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="add_gambar_ulasan" class="form-control">
              </div>

              <div class="form-group">
                <label>Date created</label>
                <input type="text" name="add_date_ulasan" class="form-control" required>
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>

              <button type="submit" class="btn btn-primary">Tambah ulasan</button>

            </div>

          </div>

        </form>

          <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

      </div>
      







<!-- jQuery -->

<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->

<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->

<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>

<script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert2 -->

<script src="<?= base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="<?= base_url() ?>assets/admin/script.js?ve=<?= time() ?>"></script>

 



<script>

  $(function () {

    $("#example1").DataTable({

      "responsive": true,

      "autoWidth": false,

    });



    $("#example2").DataTable({

      "responsive": true,

      "autoWidth": false,

    });



    $("#example3").DataTable({

      "responsive": true,

      "autoWidth": false,

    });



    $("#example4").DataTable({

      "responsive": true,

      "autoWidth": false,

    });



    $("#example5").DataTable({

      "responsive": true,

      "autoWidth": false,

    });

    $("#example6").DataTable({

      "responsive": true,

      "autoWidth": false,

    });

    $("#example7").DataTable({

      "responsive": true,

      "autoWidth": false,

    });



    // $('.custom-file-input').on('change', function() {

    //     let fileName = $(this).val().split('\\').pop();

    //     $(this).next('.custom-file-label').addClass("selected").html(fileName);

    // });

  });

  CKEDITOR.replace('desc1', {
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_BR
  });

</script>

</body>

</html>