<main class="bg_gray">





    <div class="container margin_30">

        <div class="page_header">

            <div class="breadcrumbs">

                <ul>

                    <li><a href="#">Home</a></li>

                    <li><a href="#">checkout</a></li>

                </ul>

            </div>

            <h1>Formulir pembayaran dan pengiriman produk</h1>



        </div>

        <!-- /page_header -->

        <div class="row">

            <div class="col-lg-4 col-md-6">

                <div class="step first">

                    <h3>1. Detail pengiriman produk</h3>

                    <ul class="nav nav-tabs" id="tab_checkout" role="tablist">

                        <li class="nav-item">

                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true"><p class="text-danger">Wajib *</p></a>

                        </li>

                        <!-- <li class="nav-item">

                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Login</a>

                        </li> -->

                    </ul>

                    <div class="tab-content checkout">

                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">

                            <div class="form-group">

                                <input type="email" id="email" class="form-control" placeholder="Email">

                            </div>

                            

                            <hr>

                            <div class="row no-gutters">

                                <div class="col-6 form-group pr-1">

                                    <input type="text" id="nama_a" class="form-control" placeholder="Nama depan">

                                </div>

                                <div class="col-6 form-group pl-1">

                                    <input type="text" id="nama_b" class="form-control" placeholder="Nama belakang">

                                </div>

                            </div>

                            <!-- /row -->

                            <div class="form-group">

                                <!-- <input type="text" id="alamat" class="form-control" placeholder="Alamat lengkap"> -->

                                <textarea id="alamat" class="form-control" placeholder="Alamat lengkap"></textarea>

                            </div>

                                <div class="form-group">

                                    <input type="number" id="kodepos" class="form-control" placeholder="Kode pos">

                                </div>



                            

                            <!-- /row -->

                                    <div class="form-group">

                                        <select class="form-control" id="country2">

                                            <option value="">Provinsi</option>

                                            <?php foreach ($getprovinsi->result() as $data) : ?>

                                                <option value="<?= $data->province_id ?>"><?= $data->province ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <select class="form-control" id="kota2" disabled>

                                            <option value="" selected>Kota/Kab</option>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <select class="form-control" id="kecamatan2" disabled>

                                            <option value="" selected>Kecamatan</option>

                                        </select>

                                    </div>

                            <!-- /row -->

                            <div class="form-group">

                                <input type="number" id="whatsapp" class="form-control" placeholder="Whatsapp">

                            </div>

                            <hr>

                            <div class="form-group">

                                <label class="container_check" id="other_addr">Tambahkan keterangan (opsional)

                                    <input type="checkbox">

                                    <span class="checkmark"></span>

                                </label>

                            </div>

                            <div id="other_addr_c">

                            <div class="form-group">

                                <textarea name="keterangan" class="form-control" placeholder="Contoh ukuran XL" id="keterangan"></textarea>

                            </div>

                            </div>

                            

                            <!--<div id="other_addr_c" class="pt-2">

                                <div class="row no-gutters">

                                    <div class="col-6 form-group pr-1">

                                        <input type="text" class="form-control" placeholder="Name">

                                    </div>

                                    <div class="col-6 form-group pl-1">

                                        <input type="text" class="form-control" placeholder="Last Name">

                                    </div>

                                </div>

                                <!-- /row -->

                                <!-- <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Full Address">

                                </div>

                                <div class="row no-gutters">

                                    <div class="col-6 form-group pr-1">

                                        <input type="text" class="form-control" placeholder="City">

                                    </div>

                                    <div class="col-6 form-group pl-1">

                                        <input type="text" class="form-control" placeholder="Postal code">

                                    </div>

                                </div>

                                <!-- /row -->

                                <!-- <div class="row no-gutters">

                                    <div class="col-md-12 form-group">

                                        <div class="custom-select-form">

                                            <select class="wide add_bottom_15" name="country" id="country_2">

                                                <option value="" selected>Country</option>

                                                <option value="Europe">Europe</option>

                                                <option value="United states">United states</option>

                                                <option value="Asia">Asia</option>

                                            </select>

                                        </div>

                                    </div>

                                </div> -->

                                <!-- /row -->

                                <!-- <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Telephone">

                                </div>

                            </div> -->

                            <!-- /other_addr_c -->

                            <hr>

                        </div>

                        <!-- /tab_1 -->

                        <!-- <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">

                            <a href="#0" class="social_bt facebook">Login con Facebook</a>

                            <a href="#0" class="social_bt google">Login con Google</a>

                            <div class="form-group">

                                <input type="email" class="form-control" placeholder="Email">

                            </div>

                            <div class="form-group">

                                <input type="password" class="form-control" placeholder="Password" name="password_in" id="password_in">

                            </div>

                            <div class="clearfix add_bottom_15">

                                <div class="checkboxes float-left">

                                    <label class="container_check">Remember me

                                        <input type="checkbox">

                                        <span class="checkmark"></span>

                                    </label>

                                </div>

                                <div class="float-right"><a id="forgot" href="#0">Lost Password?</a></div>

                            </div>

                            <div id="forgot_pw">

                                <div class="form-group">

                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">

                                </div>

                                <p>A new password will be sent shortly.</p>

                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>

                            </div>

                            <hr>

                            <input type="submit" class="btn_1 full-width" value="Login">

                        </div> -->

                        <!-- /tab_2 -->

                    </div>

                </div>

                <!-- /step -->

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="step middle payments">

                    <h3>2. Metode pembayaran & type pengiriman</h3>

                    <ul>

                        <!-- <li>

                            <label class="container_radio" id="pym">Paypal<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>

                                <input type="radio" name="payment1" value="paypal" checked>

                                <span class="checkmark"></span>

                            </label>

                        </li>

                        <li>

                            <label class="container_radio" id="pym">Cash on delivery (COD)<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>

                                <input type="radio" name="payment1" value="cod">

                                <span class="checkmark"></span>

                            </label>

                        </li> -->

                        <div id="pym">

                        <li>

                            <label class="container_radio">Bank Transfer<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>

                                <input type="radio" name="payment1" value="transfer">

                                <span class="checkmark"></span>

                            </label>

                        </li>

                        </div>

                        <li>

                        <div class="custom-select-form" id="metodebank">

                        <select class="wide add_bottom_15" name="metodebank" id="metodebank">

                                <option value="" selected>Metode</option>

                                <option value="BRI">Bank BRI</option>

                                <option value="BCA" disabled>Bank BCA</option>

                                <option value="BNI" disabled>Bank BNI</option>

                                <option value="MANDIRI" disabled>Bank MANDIRI</option>

                        </select>

                        </div>

                        </li>

                    </ul>

                    

                    <!-- <div class="payment_info d-none d-sm-block">

                        <figure><img src="img/cards_all.svg" alt=""></figure>

                        <p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore

                            philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones

                            sea.</p>

                    </div> -->



                    <div id="ship">

                        <select id="pengiriman">

                            <option value="">kurir</option>

                        </select>

                    </div>

                    <!-- <div class="container" id="spinners">

                      <div class="sk-wave sk-center">
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    </div>

                </div> -->



                </div>

                <!-- /step -->



            </div>

            <div class="col-lg-4 col-md-6">

                <div class="step last">

                    <h3>3. Detail total produk</h3>

                    <div class="box_general summary">

                        <ul>

                            <?php foreach ($this->cart->contents() as $items) : ?>

                                <li class="clearfix"><em><?= $items['name']; ?> </em> x<?= $items['qty']; ?><span>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></span></li>

                            <?php endforeach; ?>

                        </ul>

                        <ul>

                            <li class="clearfix"><em><strong>Subtotal</strong></em> <span>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span></li>

                            <div id="tampilhasil">

                                <li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp 0</span></li>

                            </div>



                        </ul>

                        <div id="tampiltotal">

                            <div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ', ', ' . '); ?></span></div>

                        </div>

                        <div class="form-group">

                            <label class="container_check">Terima pembaruan produk dari kami.

                                <input type="checkbox" id="newsletter" name="newsletter" checked>

                                <span class="checkmark"></span>

                            </label>

                        </div>



                        <!-- <div id="loading">Loading...</div> -->

                        <div id="tampil"></div>

                        <!-- <button class="btn_1 full-width" type="button" disabled>

                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

                          Loading...

                        </button> -->



                        <button type="submit" id="getorder" data-subtotalori="0" data-shipping="0" data-total="0" data-courier="0" class="btn_1 full-width">Bayar sekarang</button>

                    </div>

                    <!-- /box_general -->

                </div>

                <!-- /step -->

            </div>

        </div>

        <!-- /row -->

    </div>

    <!-- /container -->

</main>

<!--/main-->