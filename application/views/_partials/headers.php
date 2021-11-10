<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="<?= set('keyword') ?>">


    <meta name="description" content="<?= set('description') ?>">

    <meta name="author" content="Canuts">

    <?php if ($this->uri->segment(1) == '') : ?>

        <title><?= set('title'); ?></title>

    <?php else : ?>

        <title><?= set('nama_site'); ?> - <?= $title; ?></title>

    <?php endif; ?>



    <!-- Favicons-->

    <!-- <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/favicon.ico" type="image/x-icon">

    <link rel="apple-touch-icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/apple-touch-icon-57x57-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= base_url() ?>/assets/img/apple-touch-icon-72x72-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= base_url() ?>/assets/img/apple-touch-icon-114x114-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= base_url() ?>/assets/img/apple-touch-icon-144x144-precomposed.png"> -->

    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <!-- GOOGLE WEB FONT -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">



    <!-- BASE CSS -->

    <link href="<?= base_url() ?>/assets/css/bootstrap.custom.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/css/style.css?v=1" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery.paginate.css">




    <!-- SPECIFIC CSS -->

    <?php if ($this->uri->segment(1) == 'produk' || $this->uri->segment(1) == 'produk-terlaris') : ?>

        <link href="<?= base_url() ?>/assets/css/product_page.css" rel="stylesheet">

        <link href="<?= base_url() ?>/assets/css/listing.css" rel="stylesheet">

    <?php elseif ($this->uri->segment(1) == 'kategori') : ?>

        <link href="<?= base_url() ?>/assets/css/listing.css" rel="stylesheet">

    <?php elseif ($this->uri->segment(1) == 'cart') : ?>

        <link href="<?= base_url() ?>/assets/css/cart.css?v=2" rel="stylesheet">

    <?php elseif ($this->uri->segment(1) == 'checkout') : ?>

        <link href="<?= base_url() ?>/assets/css/checkout.css?v=2" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <?php elseif ($this->uri->segment(2) == 'login') : ?>

        <link href="<?= base_url() ?>/assets/css/account.css" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <?php elseif ($this->uri->segment(1) == 'cekongkir' || $this->uri->segment(1) == 'konfirmasi') : ?>

        <link href="<?= base_url() ?>/assets/css/leave_review.css" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <?php elseif ($this->uri->segment(1) == 'cekorder') : ?>

        <link href="<?= base_url() ?>/assets/css/error_track.css" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <?php elseif ($this->uri->segment(1) == 'contacts') : ?>

        <link href="<?= base_url() ?>/assets/css/contact.css" rel="stylesheet">
    <?php elseif ($this->uri->segment(1) == 'tambah-ulasan') : ?>
        <link href="<?= base_url() ?>/assets/css/leave_review.css" rel="stylesheet">

    <?php endif; ?>

    <link href="<?= base_url() ?>/assets/css/home_1.css" rel="stylesheet">




    <!-- YOUR CUSTOM CSS -->

    <!-- <link href="<?= base_url() ?>/assets/css/custom.css" rel="stylesheet"> -->
    <link href="<?= base_url() ?>/assets/css/spinkit.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.css">

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f1da5e6c38619001293b0f2&product=inline-share-buttons" async="async"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">


</head>



<body>
    <div class="galo"></div>

    <div id="page">



        <header class="version_1">

            <div class="layer"></div><!-- Mobile menu overlay mask -->

            <div class="main_header">

                <div class="container">

                    <div class="row small-gutters">

                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">

                            <div id="logo">

                                <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/img/<?= set('logo_white') ?>" alt="" width="100" height="35"></a>

                            </div>

                        </div>

                        <nav class="col-xl-6 col-lg-7">

                            <a class="open_close" href="javascript:void(0);">

                                <div class="hamburger hamburger--spin">

                                    <div class="hamburger-box">

                                        <div class="hamburger-inner"></div>

                                    </div>

                                </div>

                            </a>

                            <!-- Mobile menu button -->

                            <div class="main-menu">

                                <div id="header_menu">

                                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/img/<?= set('logo_dark') ?>" alt="" width="100" height="35"></a>

                                    <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>

                                </div>

                                <ul>



                                    <li class="submenu">

                                        <a href="javascript:void(0);" class="show-submenu">Home</a>

                                        <ul>

                                            <li><a href="<?= base_url() ?>cekongkir">Cek ongkir</a></li>

                                            <li><a href="<?= base_url() ?>cekorder">Cek order</a></li>

                                        </ul>

                                    </li>

                                    <li><a href="<?= base_url() ?>produk-terlaris">Produk terlaris</a></li>

                                    <li><a href="<?= base_url() ?>produk">Semua produk</a></li>

                                    <li>

                                        <a href="<?= base_url() ?>konfirmasi">Konfirmasi pembayaran</a>

                                    </li>

                                    <!-- <li>

                                        <a href="<?= base_url() ?>contacts">Hubungi kami</a>

                                    </li> -->

                                </ul>

                            </div>

                            <!--/main-menu -->

                        </nav>

                        <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">

                            <a class="phone_top" href="tel://6289670402"><strong><span>Butuh bantuan?</span><?= set('nohp'); ?></strong></a>

                        </div>

                    </div>

                    <!-- /row -->

                </div>

            </div>

            <!-- /main_header -->



            <div class="main_nav Sticky">

                <div class="container">

                    <div class="row small-gutters">

                        <div class="col-xl-3 col-lg-3 col-md-3">

                            <nav class="categories">

                                <ul class="clearfix">

                                    <li><span>

                                            <a href="#">

                                                <span class="hamburger hamburger--spin">

                                                    <span class="hamburger-box">

                                                        <span class="hamburger-inner"></span>

                                                    </span>

                                                </span>

                                                Kategori

                                            </a>

                                        </span>

                                        <div id="menu">

                                            <ul>

                                                <?php foreach ($kate1->result() as $k) : ?>

                                                    <li><span><a href="#0"><?= $k->nama_kategori; ?></a></span>

                                                        <ul>

                                                            <?php $dta = $this->db->query("SELECT * FROM subkategori WHERE kate_id='$k->kate' AND is_active = '1'")->result();

                                                            foreach ($dta as $s) : ?>

                                                                <li><a href="<?= base_url() ?>kategori/<?= slug($s->nama) ?>"><?= $s->nama; ?></a></li>

                                                            <?php endforeach; ?>

                                                        </ul>



                                                    </li>

                                                <?php endforeach; ?>

                                                <!-- <li><span><a href="#">Men</a></span>

                                                    <ul>

                                                        <li><a href="listing-grid-6-sidebar-left.html">Offers</a></li>

                                                        <li><a href="listing-grid-7-sidebar-right.html">Shoes</a></li>

                                                        <li><a href="listing-row-1-sidebar-left.html">Clothing</a></li>

                                                        <li><a href="listing-row-3-sidebar-left.html">Accessories</a></li>

                                                        <li><a href="listing-row-4-sidebar-extended.html">Equipment</a></li>

                                                    </ul>

                                                </li>

                                                <li><span><a href="#">Women</a></span>

                                                    <ul>

                                                        <li><a href="listing-grid-1-full.html">Best Sellers</a></li>

                                                        <li><a href="listing-grid-2-full.html">Clothing</a></li>

                                                        <li><a href="listing-grid-3.html">Accessories</a></li>

                                                        <li><a href="listing-grid-4-sidebar-left.html">Shoes</a></li>

                                                    </ul>

                                                </li>

                                                <li><span><a href="#">Boys</a></span>

                                                    <ul>

                                                        <li><a href="listing-grid-6-sidebar-left.html">Easy On Shoes</a></li>

                                                        <li><a href="listing-grid-7-sidebar-right.html">Clothing</a></li>

                                                        <li><a href="listing-row-3-sidebar-left.html">Must Have</a></li>

                                                        <li><a href="listing-row-4-sidebar-extended.html">All Boys</a></li>

                                                    </ul>

                                                </li>

                                                <li><span><a href="#">Girls</a></span>

                                                    <ul>

                                                        <li><a href="listing-grid-1-full.html">New Releases</a></li>

                                                        <li><a href="listing-grid-2-full.html">Clothing</a></li>

                                                        <li><a href="listing-grid-3.html">Sale</a></li>

                                                        <li><a href="listing-grid-4-sidebar-left.html">Best Sellers</a></li>

                                                    </ul>

                                                </li>

                                                <li><span><a href="#">Customize</a></span>

                                                    <ul>

                                                        <li><a href="listing-row-1-sidebar-left.html">For Men</a></li>

                                                        <li><a href="listing-row-2-sidebar-right.html">For Women</a></li>

                                                        <li><a href="listing-row-4-sidebar-extended.html">For Boys</a></li>

                                                        <li><a href="listing-grid-1-full.html">For Girls</a></li>

                                                    </ul>

                                                </li> -->



                                            </ul>



                                        </div>

                                    </li>

                                </ul>

                            </nav>

                        </div>

                        <!-- <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">

                            <div class="custom-search-input">

                                <input type="text" class="cekprodukdesktop" placeholder="Cari busana favoritmu">

                                <button type="submit" id="cariprodukdesktop"><i class="header-icon_search_custom"></i></button>

                            </div>

                        </div> -->

                        <div class="col-xl-9 col-lg-9 col-md-9">

                            <ul class="top_tools">

                                <li>

                                    <div class="dropdown dropdown-cart">

                                        <a href="<?= base_url() ?>cart" class="cart_bt"><strong><?= count($this->cart->contents()); ?></strong></a>

                                        <div class="dropdown-menu">

                                            <ul>

                                                <?php if ($this->cart->contents()) : ?>

                                                    <?php foreach ($this->cart->contents() as $item) : ?>

                                                        <li>

                                                            <a href="#">

                                                                <figure><img src="<?= base_url() ?>/assets/img/upload/<?= base_url() ?>assets/img/upload/<?= oneImage($item['options']['img']) ?>" data-src="<?= base_url() ?>assets/img/upload/<?= oneImage($item['options']['img']) ?>" alt="" width="50" height="50" class="lazy"></figure>

                                                                <strong><span><?= $item['name']; ?></span>Rp. <?= number_format($item['price'], 0, ',', '.'); ?></strong>

                                                            </a>

                                                            <a href="#0" id="<?= $item['rowid'] ?>" class="action hapus_cart"><i class="ti-trash"></i></a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                <?php else : ?>

                                                    <p>Keranjang kosong</p>

                                                <?php endif; ?>

                                            </ul>

                                            <div class="total_drop">

                                                <div class="clearfix"><strong>Total</strong><span>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></div>

                                                <a href="<?= base_url() ?>cart" class="btn_1 outline">View Cart</a><a href="<?= base_url() ?>checkout" class="btn_1">Checkout</a>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- /dropdown-cart-->

                                </li>

                                <!-- <li>

                                    <a href="#0" class="wishlist"><span>Favorite</span></a>

                                </li> -->

                                <li>

                                    <!-- <div class="dropdown dropdown-access">

                                        <a href="#" class="access_link"><span>Account</span></a>

                                        <div class="dropdown-menu">

                                            <a href="#" class="btn_1">Sign In or Sign Up</a>

                                            <ul>

                                                <li>

                                                    <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>

                                                </li>

                                                <li>

                                                    <a href="account.html"><i class="ti-package"></i>My Orders</a>

                                                </li>

                                                <li>

                                                    <a href="account.html"><i class="ti-user"></i>My Profile</a>

                                                </li>

                                                <li>

                                                    <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>

                                                </li>

                                            </ul>

                                        </div>

                                    </div> -->

                                    <!--/dropdown-access-->

                                </li>

                                <li>

                                    <a href="javascript:void(0);" class="btn_search_mob"><span>Cari produk</span></a>

                                </li>

                                <li>

                                    <a href="#menu" class="btn_cat_mob">

                                        <div class="hamburger hamburger--spin" id="hamburger">

                                            <div class="hamburger-box">

                                                <div class="hamburger-inner"></div>

                                            </div>

                                        </div>

                                        Kategori

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <!-- /row -->

                </div>

                <div class="search_mob_wp">

                    <input type="text" class="form-control cekproduk" placeholder="Cari busana kebutuhan anda">

                    <input type="submit" class="btn_1 full-width" id="cariproduk" value="Cari">

                </div>

                <!-- /search_mobile -->

            </div>

            <!-- /main_nav -->

        </header>

        <!-- /header -->