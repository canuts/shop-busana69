<main>
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">

            <div class="owl-slide cover" style="background-image: url(<?= base_url() ?>assets/img/upload/<?= $type1->gambar ?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-right white">
                                    <h2 class="owl-slide-animated owl-slide-title"><?= $type1->title; ?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?= $type1->desc; ?>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="<?= base_url() ?>kategori/<?= slug($type1->nama) ?>" role="button">Kunjungi produk</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->

            <div class="owl-slide cover" style="background-image: url(<?= base_url() ?>assets/img/upload/<?= $type1a->gambar ?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title"><?= $type1a->title; ?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?= $type1a->desc; ?>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="<?= base_url() ?>kategori/<?= slug($type1a->nama) ?>" role="button">Kunjungi produk</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(<?= base_url() ?>assets/img/upload/<?= $type1b->gambar ?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title"><?= $type1b->title; ?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?= $type1b->desc; ?>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="<?= base_url() ?>kategori/<?= slug($type1b->nama) ?>" role="button">Kunjungi produk</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->

    <ul id="banners_grid" class="clearfix">
        <?php foreach ($type2->result() as $t2) : ?>
            <li>
                <a href="<?= base_url() ?>kategori/<?= slug($t2->nama) ?>" class="img_container">
                    <img src="<?= base_url() ?>/assets/img/upload/<?= $t2->gambar; ?>" data-src="<?= base_url() ?>/assets/img/upload/<?= $t2->gambar; ?>" alt="" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3><?= $t2->title; ?></h3>
                        <div><span class="btn_1">Lihat detail</span></div>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <!--/banners_grid -->