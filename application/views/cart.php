	<main class="bg_gray">

		<div class="container margin_30">

			<div class="page_header">

				<div class="breadcrumbs">

					<ul>

						<li><a href="#">Home</a></li>

						<li><a href="#">Kategori</a></li>

						<li>Keranjang</li>

					</ul>

				</div>

				<h1>Keranjang belanja</h1>

			</div>

			<!-- /page_header -->



			<form action="<?= base_url() ?>cart/updateCart" method="post" id="formupdatecart">



			<table class="table table-striped cart-list">

				<thead>

					<tr>

						<th>Produk</th>
						<th>Variasi</th>
						<th>Harga</th>

						<th>Quantity</th>

						<th>Subtotal</th>

					</tr>

				</thead>



				<tbody>

					<?php if ($this->cart->contents()) : ?>

						<?php foreach ($this->cart->contents() as $items) : ?>

							<tr>

								<td>

									<div class="thumb_cart">

										<img src="<?= base_url() ?>assets/img/upload/<?= oneImage($items['options']['img']) ?>" data-src="<?= base_url() ?>assets/img/upload/<?= oneImage($items['options']['img']) ?>" class="lazy" alt="Image">

									</div>

									<span class="item_cart"><?= $items['name']; ?></span>

								</td>

								<td>

									<strong><?= $items['options']['variasi']; ?></strong>

								</td>

								<td>

									<strong>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></strong>

								</td>

								<td>

									<div class="numbers-row">

										<input type="text" value="<?= $items['qty'] ?>" name="quan[<?= $items['rowid'] ?>]" class="qty2">

										<!-- <input type="hidden" value="<?= $items['rowid'] ?>" name="rowidnya[]"> -->

										<div class="inc button_inc">+</div>

										<div class="dec button_inc">-</div>

									</div>

								</td>

								<td>

									<strong>Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></strong>

								</td>

								<td class="options">

									<a href="#" id="<?= $items['rowid'] ?>" class="hapus_cart"><i class="ti-trash"></i></a>

								</td>



							</tr>

						<?php endforeach; ?>

					<?php else : ?>

						<p>Tidak ada produk dalam keranjang anda</p>
						<a href="<?= base_url() ?>produk">< Belanja sekarang</a>

					<?php endif; ?>

				</tbody>



			</table>

		</form>


		<?php if(count($this->cart->contents()) !== 0) : ?>
			<div class="row add_top_30 flex-sm-row-reverse cart_actions">

				<div class="col-sm-4 text-right">

					<button type="button" class="btn_1 gray" id="uptcart">Perbarui keranjang</button>

				</div>



				<!-- <div class="col-sm-8">

					<div class="apply-coupon">

						<div class="form-group form-inline">

							<input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>

						</div>

					</div>

				</div> -->

			</div>
		<?php endif; ?>



			<!-- /cart_actions -->



		</div>

		<!-- /container -->



		<div class="box_cart">

			<div class="container">

				<div class="row justify-content-end">

					<div class="col-xl-4 col-lg-4 col-md-6">

						<ul>

							<li>

								<span>Subtotal</span> Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?>

							</li>

							<li>

								<span>Pengiriman</span> Rp. 0

							</li>

							<li>

								<span>Total</span> Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?>

							</li>

						</ul>

						<a href="<?= base_url() ?>checkout" class="btn_1 full-width cart">Lanjut ke pembayaran</a>

					</div>

				</div>

			</div>

		</div>

		<!-- /box_cart -->



	</main>

	<!--/main-->