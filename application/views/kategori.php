	<main>

		<div class="container margin_30">

			<div class="row">

				<aside class="col-lg-3" id="sidebar_fixed">

					<form action="<?= base_url(); ?>kategori" method="post">

						<div class="filter_col">

							<div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>


							<div class="filter_type version_2">

								<h4><a href="#filter_1" data-toggle="collapse" class="opened">Kategori</a></h4>

								<div class="collapse show" id="filter_1">

									<ul>

										<?php foreach ($kate5->result() as $konten) : ?>

											<?php $count = $this->db->get_where('produk', ['kategori' => $konten->nama, 'is_active' => '1'])->num_rows(); ?>

											<li>

												<label class="container_radio"><?= $konten->nama; ?> <small><?= $count; ?></small>

													<input type="radio" value="<?= $konten->nama; ?>" name="get_gori">

													<span class="checkmark"></span>

												</label>

											</li>

										<?php endforeach; ?>

									</ul>

								</div>

								<!-- /filter_type -->

							</div>

							<!-- /filter_type -->

							<div class="buttons">

								<input type="submit" value="Filter" name="gori" class="btn_1"> <a href="#0" class="btn_1 gray">Reset</a>

							</div>

						</div>

					</form>

				</aside>

				<!-- /col -->

				<div class="col-lg-9">

					<div class="top_banner">

						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">

							<div class="container pl-lg-5">

								<div class="breadcrumbs">

									<?php 

										$seg = str_replace("-", " ", $this->uri->segment(2));

									 ?>

									<ul>

										<li><a href="#">Home</a></li>

										<li><a href="#">Kategori</a></li>

										<li><?= $seg; ?></li>

									</ul>

								</div>

								<h1>Busana69 - BANDUNG</h1>

							</div>

						</div>

						<img src="<?= base_url() ?>assets/img/upload/review1.jpg" class="img-fluid" alt="">

					</div>

					<!-- /top_banner -->

					<div id="stick_here"></div>

					<div class="toolbox elemento_stick add_bottom_30">

						<div class="container">

							<ul class="clearfix">

								<!-- <li>

									<div class="sort_select">

										<select name="sort" id="sort">

											<option value="popularity" selected="selected">Sort by popularity</option>

											<option value="rating">Sort by average rating</option>

											<option value="date">Sort by newness</option>

											<option value="price">Sort by price: low to high</option>

											<option value="price-desc">Sort by price: high to

										</select>

									</div>

								</li> -->

								<li>

									<a href="#0"><i class="ti-view-grid"></i></a>

									<a href="#0"><i class="ti-view-list"></i></a>

								</li>

								<li>

									<a href="#" class="open_filters">

										<i class="ti-filter"></i><span>Filter</span>

									</a>

								</li>

							</ul>

						</div>

					</div>

					<!-- /toolbox -->

					<div class="row small-gutters">

						<?php foreach ($produk->result() as $data) : ?>

							<input type="hidden" name="quantity" id="<?= $data->sku_produk ?>" class="quantity" value="1">

							<div class="col-6 col-md-4">

								<div class="grid_item">

									<?php if ($data->is_diskon == 0) : ?>

										<noscript></noscript>

									<?php else : ?>

										<span class="ribbon off">-<?= $data->is_diskon; ?>%</span>

									<?php endif; ?>

									<figure>

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

						<!-- /col -->

					</div>

					<!-- /row -->



					<!-- <ul class="pagination">

	                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>

	                        <li>

	                            <a href="#0" class="active">1</a>

	                        </li>

	                        <li>

	                            <a href="#0">2</a>

	                        </li>

	                        <li>

	                            <a href="#0">3</a>

	                        </li>

	                        <li>

	                            <a href="#0">4</a>

	                        </li>

	                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>

						</ul> -->

					<?php if (isset($paging)) {

						echo $paging;

					} elseif (isset($paging_kate)) {

						echo $paging_kate;

					} ?>



				</div>
			</div>
		</div>
		

		<!-- /container -->

	</main>

	<!-- /main -->