<div class="container margin_60_35">

    <div class="main_title">

        <h2>Produk terbaik saat ini</h2>

        <span>HOT</span>

        <p>Semua produk terbaik akan di tampilkan disini..</p>

    </div>

    <div class="row small-gutters">





        <?php foreach ($produk->result() as $data) : ?>

            <input type="hidden" name="quantity" id="<?= $data->sku_produk ?>" class="quantity" value="1">

            <div class="col-6 col-md-4 col-xl-3">

                <div class="grid_item">

                    <figure>

                        <?php if ($data->is_diskon == 0) : ?>

                            <noscript></noscript>

                        <?php else : ?>

                            <span class="ribbon off">-<?= $data->is_diskon; ?>%</span>

                        <?php endif; ?>

                        <a href="<?= base_url(); ?>produk/<?= $data->slug; ?>">

                            <img class="img-fluid lazy" src="<?= base_url() ?>/assets/img/upload/<?= oneImage($data->gambar); ?>" data-src="<?= base_url() ?>/assets/img/upload/<?= oneImage($data->gambar); ?>" alt="">

                        </a>

                        <?php if ($data->expired !== '' && $data->is_diskon !== 0) : ?>

                            <div data-countdown="<?= $data->expired; ?>" class="countdown"></div>

                        <?php endif; ?>

                    </figure>

                    <div class="rating">Terjual: <?= $data->terjual; ?></div>

                    <a href="<?= base_url(); ?>produk/<?= $data->slug; ?>">

                        <h3><?= $data->nama; ?></h3>

                    </a>

                    <div class="price_box">

                        <?php if ($data->is_diskon == 0) : ?>

                            <span class="new_price">Rp. <?= number_format($data->price, 0, ',', '.'); ?></span>

                        <?php else : ?>

                            <span class="new_price">Rp. <?= number_format(setDiskon($data->price, $data->is_diskon), 0, ',', '.'); ?></span>

                            <span class="old_price">Rp. <?= number_format($data->price, 0, ',', '.'); ?></span>

                        <?php endif; ?>

                    </div>

                    <ul>

                        <?php if ($data->is_diskon == 0) {

                            $hargana = setPrice($data->price);

                        } else {

                            $hargana = setPrice($data->price, $data->is_diskon);

                        } ?>

                        <li><a href="<?= base_url(); ?>produk/<?= $data->slug; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Lihat detail"><i class="ti-eye"></i><span>Lihat detail</span></a></li>

                        <li><a href="https://bit.ly/2EB3lnf" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Order via whatsapp"><i class="ti-themify-favicon-alt"></i><span>Order via whatsapp</span></a></li>

                        <li><a href="#0" class="tooltip-1 add_cart" data-toggle="tooltip" data-placement="left" data-produkid="<?= $data->sku_produk ?>" data-produknama="<?= $data->nama ?>" data-produkharga="<?= $hargana; ?>" data-produkimg="<?= $data->gambar; ?>" title="Tambahkan ke keranjang"><i class="ti-shopping-cart"></i><span>Tambahkan ke keranjang</span></a></li>

                    </ul>

                </div>

                <!-- /grid_item -->

            </div>

        <?php endforeach; ?>



        <!-- /col -->

    </div>

    <!-- /row -->

</div>

<!-- /container -->



<div class="featured lazy" data-bg="url(<?= base_url() ?>assets/img/upload/<?= oneImage($thumb->thumb) ?>)">

    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">

        <div class="container margin_60">

            <div class="row justify-content-center justify-content-md-start">

                <div class="col-lg-6 wow" data-wow-offset="150">

                    <h3><?= $thumb->nama; ?></h3>

                    <p><?= thumbdetails($thumb->thumb) ?></p>

                    <div class="feat_text_block">

                        <div class="price_box">

                            <?php if ($thumb->is_diskon == 0) : ?>

                                <span class="new_price">Rp. <?= number_format($thumb->price, 0, ',', '.'); ?></span>

                            <?php else : ?>

                                <span class="new_price">Rp. <?= number_format(setDiskon($thumb->price, $thumb->is_diskon), 0, ',', '.'); ?></span>

                                <span class="old_price">Rp. <?= number_format($thumb->price, 0, ',', '.'); ?></span>

                            <?php endif; ?>

                        </div>

                        <a class="btn_1" href="<?= base_url() ?>produk/<?= $thumb->slug; ?>" role="button">Masukan ke keranjang</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- /featured -->



<div class="container margin_60_35">

    <div class="main_title">

        <h2>Semua diskon</h2>

        <span>HOT DISKON</span>

        <p>Semua produk diskon akan ditampilkan disini</p>

    </div>

    <div class="owl-carousel owl-theme products_carousel">

        <?php foreach ($hotproduk->result() as $dt) : ?>

            <div class="item">

                <input type="hidden" name="quantity" id="<?= $dt->sku_produk ?>" class="quantity" value="1">

                <div class="grid_item">

                    <span class="ribbon off">-<?= $dt->is_diskon; ?>%</span>

                    <figure>

                        <a href="<?= base_url(); ?>produk/<?= $dt->slug; ?>">

                            <img class="img-fluid lazy" src="<?= base_url() ?>/assets/img/upload/<?= oneImage($dt->gambar); ?>" data-src="<?= base_url() ?>/assets/img/upload/<?= oneImage($dt->gambar); ?>" alt="">

                        </a>

                    </figure>

                    <div class="rating">Terjual: <?= $dt->terjual; ?></div>

                    <a href="<?= base_url(); ?>produk/<?= $dt->slug; ?>">

                        <h3><?= $dt->nama; ?></h3>

                    </a>

                    <div class="price_box">

                        <span class="new_price">Rp. <?= number_format(setDiskon($dt->price, $dt->is_diskon), 0, ',', '.'); ?></span>

                        <span class="old_price">Rp. <?= number_format($dt->price, 0, ',', '.'); ?></span>

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



<!-- <div class="bg_gray">

    <div class="container margin_30">

        <div id="brands" class="owl-carousel owl-theme">

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_1.png" alt="" class="owl-lazy"></a>

            </div>

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_2.png" alt="" class="owl-lazy"></a>

            </div>

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_3.png" alt="" class="owl-lazy"></a>

            </div>

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_4.png" alt="" class="owl-lazy"></a>

            </div>

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_5.png" alt="" class="owl-lazy"></a>

            </div>

            <div class="item">

                <a href="#0"><img src="<?= base_url() ?>/assets/img/brands/placeholder_brands.png" data-src="<?= base_url() ?>/assets/img/brands/logo_6.png" alt="" class="owl-lazy"></a>

            </div>

        </div>

    </div>

</div> -->



<!-- <div class="container margin_60_35">

    <div class="main_title">

        <h2>Latest News</h2>

        <span>Blog</span>

        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>

    </div>

    <div class="row">

        <div class="col-lg-6">

            <a class="box_news" href="blog.html">

                <figure>

                    <img src="<?= base_url() ?>/assets/img/blog-thumb-placeholder.jpg" data-src="<?= base_url() ?>/assets/img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">

                    <figcaption><strong>28</strong>Dec</figcaption>

                </figure>

                <ul>

                    <li>by Mark Twain</li>

                    <li>20.11.2017</li>

                </ul>

                <h4>Pri oportere scribentur eu</h4>

                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>

            </a>

        </div>

        

        <div class="col-lg-6">

            <a class="box_news" href="blog.html">

                <figure>

                    <img src="<?= base_url() ?>/assets/img/blog-thumb-placeholder.jpg" data-src="<?= base_url() ?>/assets/img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">

                    <figcaption><strong>28</strong>Dec</figcaption>

                </figure>

                <ul>

                    <li>By Jhon Doe</li>

                    <li>20.11.2017</li>

                </ul>

                <h4>Duo eius postea suscipit ad</h4>

                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>

            </a>

        </div>

       

        <div class="col-lg-6">

            <a class="box_news" href="blog.html">

                <figure>

                    <img src="<?= base_url() ?>/assets/img/blog-thumb-placeholder.jpg" data-src="<?= base_url() ?>/assets/img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">

                    <figcaption><strong>28</strong>Dec</figcaption>

                </figure>

                <ul>

                    <li>By Luca Robinson</li>

                    <li>20.11.2017</li>

                </ul>

                <h4>Elitr mandamus cu has</h4>

                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>

            </a>

        </div>

        

        <div class="col-lg-6">

            <a class="box_news" href="blog.html">

                <figure>

                    <img src="<?= base_url() ?>/assets/img/blog-thumb-placeholder.jpg" data-src="<?= base_url() ?>/assets/img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">

                    <figcaption><strong>28</strong>Dec</figcaption>

                </figure>

                <ul>

                    <li>By Paula Rodrigez</li>

                    <li>20.11.2017</li>

                </ul>

                <h4>Id est adhuc ignota delenit</h4>

                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>

            </a>

        </div>

        

    </div>

</div> -->

<!-- /container -->

</main>

<!-- /main -->