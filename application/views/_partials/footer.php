<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_1">Tautan langsung</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <!-- <li><a href="<?= base_url() ?>about">Tentang kami</a></li> -->
                        <li><a href="<?= base_url() ?>contacts">Hubungi kami</a></li>
                        <li><a href="<?= base_url() ?>cekorder">Cek pesanan</a></li>
                        <li><a href="<?= base_url() ?>cekongkir">Cek ongkir</a></li>
                        <li><a href="<?= base_url() ?>konfirmasi">Konfirmasi pembayaran</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_2">Kategori</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <?php
                    $katebottom = $this->db->query("SELECT * FROM subkategori WHERE is_active = '1' ORDER BY RAND() LIMIT 5");

                    ?>
                    <ul>
                        <?php foreach ($katebottom->result() as $kategori) : ?>
                            <li><a href="<?= base_url() ?>kategori/<?= slug($kategori->nama) ?>"><?= $kategori->nama; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_3">Alamat kami</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i><?= set('alamat'); ?></li>
                        <li><i class="ti-headphone-alt"></i><?= set('nohp'); ?></li>
                        <li><i class="ti-email"></i><a href="#0"><?= set('email'); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_4">Berlangganan</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" id="email_newsletter" class="form-control" placeholder="Email anda">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                    <!-- <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?>/assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?>/assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?>/assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?>/assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="English" selected>ID</option>
                                <option>EN</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="US Dollars" selected>Rupiah</option>
                            </select>
                        </div>
                    </li>
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?>/assets/img/gobank.png" alt="" style="width: 198px;height: 30px" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="<?= base_url() ?>terms">Syarat dan ketentuan</a></li>
                    <li><a href="<?= base_url() ?>privacy">Privacy</a></li>
                    <li><span>© <?= set('copyright'); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div><!-- Back to top button -->
<div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payments_method_title">Intruksi pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Untuk pembayaran via bank kami menerima metode: BRI untuk sementara dengan metode BNI,BCA dan MANDIRI kami matikan, jika anda ingin membayar pembayaran yang berbeda silahkan hubungi kami via whatsapp atau kunjungi halaman <a href="<?= base_url() ?>contacts">ini</a><br></p>
            </div>
        </div>
    </div>
</div>
<!-- Cekorder -->
<div class="modal fade" id="cekorder" tabindex="-1" role="dialog" aria-labelledby="cek_order" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judul" id="cek_order">Cek order pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="isi">

            </div>
            <div class="modal-footer btnshow">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_ulasan" tabindex="-1" role="dialog" aria-labelledby="tambah_ulasan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judul" id="cek_order">Tambah ulasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Invoice</label>
                <div class="form-group">
                    <small>Masukan invoice anda untuk menambahkan ulasan ke produk..</small>
                    <input type="text" name="invoice_id" class="form-control">
                </div>
            </div>
            <div class="modal-footer btnshow">
                <button type="button" class="btn btn-primary" id="btnulasan">Tambahkan ulasan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="variasi-guide" id="size-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">intruksi variasi & ukuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Untuk memilih ukuran / variasi silahkan pilih sesuai kebutuhan dan stok barang tersedia.</p>
                <!--  <div class="table-responsive">
                                <table class="table table-striped table-sm sizes">
                                    <tbody><tr>
                                        <th scope="row">US Sizes</th>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                        <td>10,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Euro Sizes</th>
                                        <td>39</td>
                                        <td>39</td>
                                        <td>40</td>
                                        <td>40-41</td>
                                        <td>41</td>
                                        <td>41-42</td>
                                        <td>42</td>
                                        <td>42-43</td>
                                        <td>43</td>
                                        <td>43-44</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">UK Sizes</th>
                                        <td>5,5</td>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Inches</th>
                                        <td>9.25"</td>
                                        <td>9.5"</td>
                                        <td>9.625"</td>
                                        <td>9.75"</td>
                                        <td>9.9375"</td>
                                        <td>10.125"</td>
                                        <td>10.25"</td>
                                        <td>10.5"</td>
                                        <td>10.625"</td>
                                        <td>10.75"</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CM</th>
                                        <td>23,5</td>
                                        <td>24,1</td>
                                        <td>24,4</td>
                                        <td>24,8</td>
                                        <td>25,4</td>
                                        <td>25,7</td>
                                        <td>26</td>
                                        <td>26,7</td>
                                        <td>27</td>
                                        <td>27,3</td>
                                    </tr>
                                </tbody></table>
                            </div> -->
                <!-- /table -->
            </div>
        </div>
    </div>
</div>

<!-- <div class="popup_wrapper">
        <div class="popup_content">
            <span class="popup_close">Close</span>
            <a href="#"><img class="img-fluid" src="<?= base_url() ?>assets/img/banner_popup.png" alt="" width="500" height="500"></a>
        </div>
    </div> -->

<!-- COMMON SCRIPTS -->
<script src="<?= base_url() ?>/assets/js/common_scripts.min.js"></script>
<script src="<?= base_url() ?>/assets/js/main.js?v=3"></script>
<script src="<?= base_url() ?>/assets/admin/jquery.paginate.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="<?= base_url() ?>/assets/js/carousel-home.min.js"></script>



<!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-856bfd2a-faf7-4dd0-bdec-6e5c15596bd7"></div>-->

<script async data-id="55483" src="https://cdn.widgetwhats.com/script.min.js"></script>


<!-- SPECIFIC SCRIPTS -->
<?php if ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'produk-terlaris') : ?>
    <script src="<?= base_url() ?>/assets/js/carousel_with_thumbs.js"></script>
    <script src="<?= base_url() ?>/assets/js/sticky_sidebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/specific_listing.js"></script>
<?php elseif ($this->uri->segment(1) == 'kategori') : ?>
    <script src="<?= base_url() ?>/assets/js/sticky_sidebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/specific_listing.js"></script>
<?php elseif ($this->uri->segment(1) == 'checkout') : ?>
    <script>
        var base_url = '<?= set('url') ?>/';
        $('#other_addr input').on("change", function() {
            if (this.checked)
                $('#other_addr_c').fadeIn('fast');
            else
                $('#other_addr_c').fadeOut('fast');
        });
        $(function() {
            $('#metodebank').fadeOut('fast');
            $('#pym input').change(function() {
                if ($('input:checked').val() == 'transfer') {
                    $('#metodebank').fadeIn('fast');
                } else {
                    $('#metodebank').fadeOut('fast');
                }
            });
        });

        $(document).ready(function() {
            $('#getorder').on('click', function() {
                var email = $('#email').val();
                var nama_a = $('#nama_a').val();
                var nama_b = $('#nama_b').val();
                var alamat = $('#alamat').val();
                var kodepos = $('#kodepos').val();
                var alamat_p = $('#country2').val();
                var whatsapp = $('#whatsapp').val();
                var ship_kota = $('#kota2').val();
                var ship_kecamatan = $('#kecamatan2').val();
                var keterangan = $('#keterangan').val();
                var payment = $('input[name=payment1]:checked').val();
                var metode = $('select[name=metodebank]').val();
                var subtotal = $(this).data('subtotalori');
                var shipping = $(this).data('shipping');
                var total = $(this).data('total');
                var courier = $(this).data('courier');
                var newsletter = 'not_checked';

                if ($('#newsletter').is(':checked')) {
                    var newsletter = 'is_checked';
                }

                $.ajax({
                    url: base_url + "checkout/getOrder",
                    method: "post",
                    cache: false,
                    dataType: 'json',
                    data: {
                        email: email,
                        nama_a: nama_a,
                        nama_b: nama_b,
                        alamat: alamat,
                        kodepos: kodepos,
                        alamat_p: alamat_p,
                        whatsapp: whatsapp,
                        ship_kota: ship_kota,
                        ship_kecamatan: ship_kecamatan,
                        keterangan: keterangan,
                        payment: payment,
                        metode: metode,
                        shipping: shipping,
                        total: total,
                        courier: courier,
                        newsletter: newsletter
                    },
                    beforeSend: function() {
                        $('#getorder').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.type == 'sukses') {
                            $('#getorder').html('Bayar sekarang').attr('disabled', true);
                            $('#tampil').html(data.pesan);
                            setTimeout(() => {
                                window.location = base_url + "konfirmasi";
                            }, 10000);
                        } else {
                            $('#getorder').html('Bayar sekarang').attr('disabled', false);
                            $('#tampil').html(data.pesan);
                            setTimeout(() => {
                                window.location = base_url + "checkout";
                            }, 3000);
                        }
                    }
                });

            });
        });
        $(document).ready(function() {
            $('#ship').fadeOut('fast');

            $('#country2').change(function() {
                var provinsi_id2 = $('#country2').val();

                if (provinsi_id2 == '') {
                    $('#kota2').html('<option value="" selected>Kota/Kab</option>').attr('disabled', true);
                    $('#kecamatan2').html('<option value="" selected>Kecamatan</option>').attr('disabled', true);
                    $('#ship').fadeOut('fast');
                    $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                    $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                    $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                    $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-shipping", "0");
                    $("#getorder").attr("data-courier", "0");
                    return;
                }
                $.ajax({
                    url: base_url + 'checkout',
                    method: 'POST',
                    dataType: 'html',
                    data: {
                        provinsi_id2: provinsi_id2
                    },
                    success: function(hasilnya) {
                        $('#kota2').html(hasilnya).attr('disabled', false);
                    }
                });
            });

            $('#kota2').change(function() {
                var kota_id2 = $('#kota2').val();

                if (kota_id2 == '') {
                    $('#kecamatan2').html('<option value="" selected>Kecamatan</option><br>').attr('disabled', true);
                    $('#ship').fadeOut('fast');
                    $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                    $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                    $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                    $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-shipping", "0");
                    $("#getorder").attr("data-courier", "0");
                    return;
                }

                $.ajax({
                    url: base_url + 'checkout',
                    method: 'POST',
                    dataType: 'html',
                    data: {
                        kota_id2: kota_id2
                    },
                    success: function(hasilnyaa) {
                        $('#kecamatan2').html(hasilnyaa).attr('disabled', false);
                    }
                });
            });
            $('#spinners').hide();
            $('#kecamatan2').change(function() {
                var kecamatan_id2 = $('#kecamatan2').val();

                if (kecamatan_id2 == '') {
                    $('#ship').fadeOut('fast');
                    $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                    $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                    $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                    $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-shipping", "0");
                    $("#getorder").attr("data-courier", "0");
                    return;
                }

                $.ajax({
                    url: base_url + 'checkout/getOngkir2',
                    method: 'POST',
                    dataType: 'html',
                    data: {
                        kecamatan_id2: kecamatan_id2
                    },
                    beforeSend: function() {
                        $('#ship').html('<div class="sk-wave sk-center"><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div></div>');
                        $('#ship').fadeIn(1000);
                    },
                    success: function(hasilnyaaa) {
                        $('#ship').hide();
                        $('#ship').html(hasilnyaaa);
                        $('#ship').fadeIn('fast');
                    }
                });
            });

            $('#ship').click(function() {
                $('#pengiriman').change(function() {
                    var pengiriman = $('#pengiriman').val();
                    var exp = pengiriman.split("|");
                    if (pengiriman == '') {
                        $("#getorder").attr("data-courier", "0");
                    }
                    $.ajax({
                        url: base_url + 'checkout/cekOngkir',
                        data: 'pengiriman=' + pengiriman,
                        type: 'POST',
                        dataType: 'json',
                        success: function(msg) {
                            $('#spinners').fadeOut('fast');
                            $("#tampiltotal").html(msg.total);
                            $("#tampilhasil").html(msg.shipping);
                            $("#getorder").attr("data-subtotalori", msg.subtotalori_i);
                            $("#getorder").attr("data-total", msg.total_i);
                            $("#getorder").attr("data-shipping", msg.shipping_i);
                            $("#getorder").attr("data-courier", exp[1]);
                        }
                    });
                });
            });

        });
    </script>
<?php endif; ?>
<script>
    var base_url = '<?= set('url') ?>/';
    $(document).ready(function() {
        $('.add_cart').click(function() {
            var produk_id = $(this).data('produkid');
            var produk_nama = $(this).data('produknama');
            var produk_harga = $(this).data('produkharga');
            var produk_image = $(this).data('produkimg');
            var quantity = $('#add_qty').val();
            var variasi = $('#variasi').val();
            if (quantity == null && variasi == null) {
                var quantity = 1;
                var variasi = '';
            }
            $.ajax({
                url: base_url + "cart/addToCart",
                method: "POST",
                data: {
                    produk_id: produk_id,
                    produk_nama: produk_nama,
                    produk_harga: produk_harga,
                    produk_image: produk_image,
                    quantity: quantity,
                    variasi: variasi
                },
                beforeSend: function() {
                    $('.galo').css('display', 'block');
                },
                success: function() {
                    setTimeout(() => {
                        $('.galo').css('display', 'none');
                        window.location = base_url + "cart";
                    }, 5000);
                }
            });
        });

        $('.hapus_cart').on('click', function(e) {
            e.preventDefault();
            var row_id = $(this).attr("id");
            $.ajax({
                url: base_url + "cart/delCart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function() {
                    toastr.success('produk telah berhasil dihapus dalam keranjang anda');
                    setTimeout(() => {
                        window.location = base_url + "cart";
                    }, 5000);
                }
            });
        });

        // Cekongkir

        //$('.hasilcek').hide();
        $('#provinsi').change(function() {
            var provinsi_id = $('#provinsi').val();
            if (provinsi_id == '') {
                $('#kota').html('<option value="" selected>Pilih kota</option>').attr('disabled', true);
                $('#kecamatan').html('<option value="" selected>Pilih kecamatan</option>').attr('disabled', true);
                $('#kurir').attr('disabled', true);
                return;
            }
            $.ajax({
                url: base_url + 'cekongkir',
                method: 'POST',
                dataType: 'html',
                data: {
                    provinsi_id: provinsi_id
                },
                success: function(cokot) {
                    $('#kota').html(cokot).attr('disabled', false);
                }
            });


            $('#kota').change(function() {
                var kota_id = $('#kota').val();

                if (kota_id == '') {
                    $('#kecamatan').html('<option value="" selected>Pilih kecamatan</option><br>').attr('disabled', true);
                    $('#kurir').attr('disabled', true);
                    return;
                }

                $.ajax({
                    url: base_url + 'cekongkir',
                    method: 'POST',
                    dataType: 'html',
                    data: {
                        kota_id: kota_id
                    },
                    success: function(cokott) {
                        $('#kecamatan').html(cokott).attr('disabled', false);
                        $('#kurir').attr('disabled', false);
                    }
                });
            });
        });

        $('#cekongkir1').click(function() {
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var kecamatan_id = $('#kecamatan').val();
            var kurir = $('#kurir').val();

            if (provinsi == '' || kota == '' || kecamatan == '' || kurir == '') {
                $('.hasilcek').html('<div class="alert alert-danger" role="alert">Mohon pilih input yang belum terisi</div>');
                return;
            }

            $.ajax({
                url: base_url + 'cekongkir/getOngkir',
                method: 'POST',
                dataType: 'html',
                data: {
                    kecamatan_id: kecamatan_id,
                    kurir: kurir
                },
                beforeSend: function() {
                    $('.hasilcek').html('<div class="sk-wave sk-center"><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div></div>');
                },
                success: function(cokottt) {
                    $('.hasilcek').html(cokottt);
                }
            });

        });

    });
    //$('#loading').fadeOut('fast');

    $(function() {
        $('#tracking').click(function() {
            var idpesanan = $('#idpesanan').val();

            if ($.trim(idpesanan) == '') {
                $('#isi').html('<div class="alert alert-danger" role="alert">Mohon isi input id pesanan</div>');
                $('.btnshow').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>');
                $('#cekorder').modal('show');
                return;
            }
            $.ajax({
                url: base_url + 'cekorder',
                method: 'POST',
                dataType: 'json',
                data: {
                    idpesanan: idpesanan
                },
                beforeSend: function() {
                    $('.galo').css('display', 'block');
                },
                success: function(res) {
                    $('#isi').html(res.pesan);
                    $('.btnshow').html(res.btn);
                    $('.judul').html('Idpesanan #' + idpesanan);
                    $('#cekorder').modal('show');
                },
                complete: function() {
                    $('.galo').css('display', 'none');
                }
            });
        });
    });


    $(document).ready(function() {
        $('.btnshow').on('click', function() {

            if ($('button[id=cekresi5]').is(':submit')) {
                var resi = $('#cekresi5').data('resi');
                var kurir = $('#cekresi5').data('kurir');
                $.ajax({
                    url: base_url + 'cekorder/goresi',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        resi: resi,
                        kurir: kurir
                    },
                    beforeSend: function() {
                        $('#cekorder').modal('hide');
                        $('.galo').css('display', 'block');
                    },
                    success: function(pon) {
                        $('#isi').html(pon.pesan);
                        $('.btnshow').html(pon.btn);
                        $('.judul').html('Cek resi #' + resi);
                        $('#cekorder').modal('show');
                    },
                    complete: function() {
                        $('.galo').css('display', 'none');
                    }
                });
            } else if ($('button[id=bayar]').is(':submit')) {
                window.location = base_url + "konfirmasi";
            }
        });
    });

    $(document).ready(function() {
        $('#uptcart').click(function() {
            $('#formupdatecart').submit();
        });

        $('#submit-newsletter').click(function() {
            // toastr.success('Kategori berhasil di update');
            var email = $('#email_newsletter').val();
            if ($.trim(email) == '') {
                toastr.error('Mohon isi email anda');
                return;
            }

            $.ajax({
                url: base_url + 'ajax/newsletter',
                method: 'POST',
                dataType: 'json',
                data: {
                    email: email
                },
                success: function(hasil) {
                    $('#email_newsletter').val('');
                    if (hasil.type == 'sukses') {
                        toastr.success(hasil.pesan);
                    } else {
                        toastr.error(hasil.pesan);
                    }
                }
            });
        });

        $('#hubungi_email').click(function() {
            var nama_hubungi = $('#nama_hubungi').val();
            var email_hubungi = $('#email_hubungi').val();
            var pesan_hubungi = $('#pesan_hubungi').val();

            if ($.trim(nama_hubungi) == '' || $.trim(email_hubungi) == '' || $.trim(pesan_hubungi) == '') {
                toastr.error('Mohon isi input yang kosong');
                return;
            }

            $.ajax({
                url: base_url + 'ajax/hubungi',
                method: 'POST',
                dataType: 'json',
                data: {
                    nama: nama_hubungi,
                    email: email_hubungi,
                    pesan: pesan_hubungi
                },
                beforeSend: function() {
                    $('.galo').css('display', 'block');
                },
                success: function(re) {
                    $('.galo').css('display', 'none');
                    $('#nama_hubungi').val('');
                    $('#email_hubungi').val('');
                    $('#pesan_hubungi').val('');
                    if (re.type == 'sukses') {
                        toastr.success(re.pesan);
                    } else {
                        toastr.error(re.pesan);
                    }
                }
            });
        });


    });

    // function validateEmail(email) {
    //     const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     return re.test(email);
    // }

    $(function() {
        $('.cekproduk').autocomplete({
            source: base_url + 'ajax/autocompleteMobile'
        });

        $('#cariproduk').click(function() {
            var getproduk = $('.cekproduk').val();
            if ($.trim(getproduk) == '') {
                toastr.error('Mohon isi produk yang anda cari');
                return;
            } else {
                var nama = $('.cekproduk').val();
                $.ajax({
                    url: base_url + 'ajax/cekAutocompleteMobile',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        nama: nama
                    },
                    success: function(hasilcek) {
                        if (hasilcek.type == 'ada') {
                            window.location = base_url + "produk/" + hasilcek.slug;
                        } else {
                            $('.cekproduk').val('');
                            toastr.error(hasilcek.slug);
                        }
                    }
                });
            }
        });

        $('#btnulasan').click(function() {
            var invoice = $('input[name="invoice_id"]').val();
            if ($.trim(invoice) == '') {
                toastr.error('Mohon masukan invoice anda, jangan kosong');
                return;
            }
            $.ajax({
                url: base_url + 'ajax/cekRating',
                method: 'POST',
                dataType: 'json',
                data: {
                    invoice: invoice
                },
                success: function(go) {
                    if (go.type == 'sukses') {
                        setTimeout(() => {
                            window.location = base_url + "tambah-ulasan/" + go.pesan;
                        }, 3000);
                    } else {
                        $('input[name="invoice_id"]').val('');
                        toastr.error(go.pesan);
                    }
                }
            });
        });

        $('#ulasanpaging').paginate({
            'perPage': 6,
            'paginatePosition': ['bottom']
        });

        $("a.single_image").fancybox();

    });
</script>


</body>

</html>