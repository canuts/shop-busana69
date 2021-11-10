<main>

    <div class="container margin_30">

        <?php if ($detail->expired == '' && $detail->is_diskon == 0) : ?>

            <noscript></noscript>

        <?php else : ?>

            <div class="countdown_inner">-<?= $detail->is_diskon; ?>% Berakhir dalam <div data-countdown="<?= $detail->expired; ?>" class="countdown"></div>

            </div>

        <?php endif; ?>

        <div class="row">

            <div class="col-md-6">

                <div class="all">

                    <div class="slider">

                        <div class="owl-carousel owl-theme main">

                            <?php

                            foreach ($dari as $key) :

                            ?>

                                <div style="background-image: url(<?= base_url() ?>/assets/img/upload/<?= $key ?>);" class="item-box"></div>

                            <?php endforeach; ?>

                        </div>

                        <div class="left nonl"><i class="ti-angle-left"></i></div>

                        <div class="right"><i class="ti-angle-right"></i></div>

                    </div>
                    
                    <div class="slider-two">

                        <div class="owl-carousel owl-theme thumbs">

                            <?php

                            foreach ($dari as $key => $value) :

                            ?>

                                <?php if ($key == 0) : ?>

                                    <div style="background-image: url(<?= base_url() ?>/assets/img/upload/<?= $value ?>);" class="item active"></div>

                                <?php elseif ($key !== 0) : ?>

                                    <div style="background-image: url(<?= base_url() ?>/assets/img/upload/<?= $value ?>);" class="item"></div>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </div>

                        <div class="left-t nonl-t"></div>

                        <div class="right-t"></div>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="breadcrumbs">

                    <ul>

                        <li><a href="#">Detail</a></li>

                        <li><a href="#">kategori</a></li>

                        <li><a href="<?= base_url() ?>kategori/<?= str_replace(" ", "-", strtolower($detail->kategori)) ?>"><?= $detail->kategori; ?></a></li>

                    </ul>

                </div>

                <?= $this->session->flashdata('message'); ?>

                <!-- /page_header -->

                <div class="prod_info">

                    <h1><?= $detail->nama; ?></h1>

                    <!-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span> -->

                    <p><small>SKU PRODUK: <?= $detail->sku_produk; ?></small><br>
                    <small>DILIHAT: <?= $detail->review; ?></small><br>
                    <small>TERJUAL: <?= $detail->terjual; ?></small></p><p>Produk kami semua asli bukan imporan, note untuk mengorder mhon untuk membaca dulu deskripsi produk..<br>Silahkan pilih variasi / ukuran sesuai kebutuhan anda, selagi produk masih tampil berarti produk masih tersedia.. terimakasih selamat mengorder :)</p>

                    <div class="prod_options">

                        <!-- <div class="row">

                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>

                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">

                                <ul>

                                    <li><a href="#0" class="color color_1 active"></a></li>

                                    <li><a href="#0" class="color color_2"></a></li>

                                    <li><a href="#0" class="color color_3"></a></li>

                                    <li><a href="#0" class="color color_4"></a></li>

                                </ul>

                            </div>

                        </div> -->

                        <?php 

                            $exp_size = explode("|", $detail->size);

                         ?>

                        <div class="row">

                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Variasi</strong> - Ukuran <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>

                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">

                                <div class="custom-select-form">

                                    <select class="wide" id="variasi">

                                        <?php foreach($exp_size as $dana) : ?>

                                        <option value="<?= $dana ?>"><?= $dana; ?></option>

                                    <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Jumlah</strong></label>

                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">

                                <div class="numbers-row">

                                    <input type="number" value="1" id="add_qty" class="qty2" name="quantity_1">

                                    

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-5 col-md-6">

                            <?= $price; ?>

                        </div>

                        <?php if ($detail->is_diskon == 0) {

                            $hargana = setPrice($detail->price);

                        } else {

                            $hargana = setPrice($detail->price, $detail->is_diskon);

                        } ?>

                        <div class="col-lg-4 col-md-6">

                            <div class="btn_add_to_cart"><a href="#0" class="btn_1 add_cart" data-produkid="<?= $detail->sku_produk ?>" data-produknama="<?= $detail->nama ?>" data-produkharga="<?= $hargana; ?>" data-produkimg="<?= $detail->gambar; ?>">Beli sekarang</a></div>

                        </div>

                    </div>

                </div>

                <!-- /prod_info -->

                

                <!-- /product_actions -->

            </div>

        </div>

        <!-- /row -->

    </div>

    <!-- /container -->



    <div class="tabs_product">

        <div class="container">

            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item">

                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Detail produk</a>

                </li>

                <li class="nav-item">

                    <a id="tab-A" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Share ke teman</a>

                </li>

                <li class="nav-item">
                        <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Ulasan pengguna</a>
                </li>

                

            </ul>

        </div>

    </div>

    <!-- /tabs_product -->

    <div class="tab_content_wrapper">

        <div class="container">

            <div class="tab-content" role="tablist">

                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">

                    <div class="card-header" role="tab" id="heading-A">

                        <h5 class="mb-0">

                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">

                                Deskripsi produk

                            </a>

                        </h5>

                    </div>

                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">

                        <div class="card-body">

                            <div class="row justify-content-between">

                                <div class="col-lg-6">

                                    <h3>Details</h3>

                                    <p><?= $detail->desc; ?></p>

                                </div>

                                <div class="col-lg-5">

                                    <h3>Spesifikasi</h3>

                                    <div class="table-responsive">

                                        <table class="table table-sm table-striped">

                                            <tbody>

                                                <tr>

                                                    <td><strong>Warna</strong></td>

                                                    <td><?= $detail->warna; ?></td>

                                                </tr>

                                                <tr>

                                                    <td><strong>Variasi & Ukuran</strong></td>

                                                    <td><?= count($exp_size); ?> Pilihan</td>

                                                </tr>

                                                <tr>

                                                    <td><strong>Berat</strong></td>

                                                    <td><?= $detail->berat; ?> Gram</td>

                                                </tr>

                                                <tr>

                                                    <td><strong>Kategori</strong></td>

                                                    <td><a href="<?= base_url(); ?>kategori/<?= slug($detail->kategori); ?>"><?= $detail->kategori; ?></a></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <!-- /table-responsive -->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /TAB A -->

                 <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">

                    <div class="card-header" role="tab" id="heading-B">

                        <h5 class="mb-0">

                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">

                                Share ke teman anda

                            </a>

                        </h5>

                    </div>

                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">

                        <div class="card-body">
                            <div class="sharethis-inline-share-buttons"></div>

                        </div>

                        

                    </div>

                </div>
                <!-- Tab C-->

                <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                        <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                                    Ulasan pengguna
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <?php if($ulasan->num_rows() == 0) : ?>
                                        <p>Belum ada ulasan untuk produk ini</p>
                                        <p class="text-right"><a href="#" data-toggle="modal" data-target="#tambah_ulasan" class="btn_1">Berikan ulasan</a></p>
                                    <?php else : ?>
                                <div class="row justify-content-between" id="ulasanpaging">
                                        <?php foreach($ulasan->result() as $user) : ?>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <?php if($user->rate == 1) : ?>
                                                    <span class="rating"><i class="icon-star"></i><em>1.0/1.0</em></span>
                                                <?php elseif($user->rate == 2) : ?>
                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><em>2.0/2.0</em></span>
                                                <?php elseif($user->rate == 3) : ?>
                                                    <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>3.0/3.0</em></span>
                                                <?php elseif($user->rate == 4) : ?>
                                                    <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>4.0/4.0</em></span>
                                                <?php else : ?>
                                                    <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                                <?php endif; ?>
                                                <em><?= $user->date_created; ?></em>
                                            </div>
                                            <h4><?= $user->nama; ?></h4>
                                            <p><?= $user->pesan; ?></p>
                                            <?php if($user->gambar == '') : ?>
                                                <a href="<?= base_url() ?>assets/img/upload/<?= oneImage($detail->gambar) ?>" class="single_image"><img src="<?= base_url() ?>assets/img/upload/<?= oneImage($detail->gambar) ?>" width="60" height="60" alt="<?= $user->pesan ?>"></a>
                                            <?php else : ?>
                                                <a href="<?= base_url() ?>assets/img/rating/<?= $user->gambar ?>" class="single_image"><img src="<?= base_url() ?>assets/img/rating/<?= $user->gambar ?>" width="60" height="60" alt="<?= $user->pesan ?>"></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <!-- /row -->
                                <p class="text-right"><a href="#" data-toggle="modal" data-target="#tambah_ulasan" class="btn_1">Berikan ulasan</a></p>
                            <?php endif; ?>
                            </div>
                            <!-- /card-body -->
                        </div>
                    </div>
                    <!-- /tab B -->

           

            </div>

            <!-- /tab-content -->

        </div>

        <!-- /container -->

    </div>

    <!-- /tab_content_wrapper -->



    <div class="container margin_60_35">

        <div class="main_title">

            <h2>Produk serupa</h2>

            <span>Related</span>

            <p>Produk serupa dengan kategori.</p>

        </div>

        <div class="owl-carousel owl-theme products_carousel">

            <?php foreach($related->result() as $dt) : ?>

            <div class="item">

                <div class="grid_item">

                    <?php if ($dt->is_diskon == 0) : ?>

                            <noscript></noscript>

                        <?php else : ?>

                            <span class="ribbon off">-<?= $dt->is_diskon; ?>%</span>

                        <?php endif; ?>

                    <figure>

                        <a href="<?= base_url(); ?>produk/<?= $dt->slug; ?>">

                            <img class="owl-lazy" src="<?= base_url() ?>/assets/img/upload/<?= oneImage($dt->gambar); ?>" data-src="<?= base_url() ?>/assets/img/upload/<?= oneImage($dt->gambar); ?>" alt="">

                        </a>

                    </figure>

                    <div class="rating">Terjual: <?= $dt->terjual; ?></div>

                    <a href="<?= base_url(); ?>produk/<?= $dt->slug; ?>">

                        <h3><?= $dt->nama; ?></h3>

                    </a>

                    <div class="price_box">

                        <?php if ($dt->is_diskon == 0) : ?>

                            <span class="new_price">Rp. <?= number_format($dt->price, 0, ',', '.'); ?></span>

                        <?php else : ?>

                            <span class="new_price">Rp. <?= number_format(setDiskon($dt->price, $dt->is_diskon), 0, ',', '.'); ?></span>

                            <span class="old_price">Rp. <?= number_format($dt->price, 0, ',', '.'); ?></span>

                        <?php endif; ?>

                    </div>

                    <ul>



                        <?php if ($dt->is_diskon == 0) {

                            $hargana = setPrice($dt->price);

                        } else {

                            $hargana = setPrice($dt->price, $dt->is_diskon);

                        } ?>

                        <li><a href="<?= base_url(); ?>produk/<?= $dt->slug; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Lihat detail"><i class="ti-eye"></i><span>Lihat detail</span></a></li>

                        <li><a href="https://bit.ly/2EB3lnf" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Order via whatsapp"><i class="ti-themify-favicon-alt"></i><span>Order via whatsapp</span></a></li>

                        <li><a href="#0" class="tooltip-1 add_cart" data-toggle="tooltip" data-placement="left" data-produkid="<?= $dt->sku_produk ?>" data-produknama="<?= $dt->nama ?>" data-produkharga="<?= $hargana; ?>" data-produkimg="<?= $dt->gambar; ?>" title="Tambahkan ke keranjang"><i class="ti-shopping-cart"></i><span>Tambahkan ke keranjang</span></a></li>

                    </ul>

                </div>

                <!-- /grid_item -->

            </div>

        <?php endforeach; ?>

            <!-- /item -->

            <!-- /item -->

        </div>

        <!-- /products_carousel -->

    </div>

    <!-- /container -->



    <div class="feat">

        <div class="container">

            <ul>

                <li>

                    <div class="box">

                        <i class="ti-gift"></i>

                        <div class="justify-content-center">

                            <h3>Gratis ongkir</h3>

                            <p>Khusus provinsi jawa barat</p>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="box">

                        <i class="ti-wallet"></i>

                        <div class="justify-content-center">

                            <h3>Pembayaran</h3>

                            <p>100% pembayaran aman</p>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="box">

                        <i class="ti-headphone-alt"></i>

                        <div class="justify-content-center">

                            <h3>24 Jam</h3>

                            <p>Fast respon</p>

                        </div>

                    </div>

                </li>

            </ul>

        </div>

    </div>

    <!--/feat-->



</main>

<!-- /main -->



