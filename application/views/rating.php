<main>	
	<div class="container margin_60_35">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<form action="<?= base_url() ?>tambah-ulasan/<?= $getnum ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="sku_produk" value="<?= $sku_produk ?>">
					<div class="write_review">
						<?= $this->session->flashdata('message'); ?>
						<h1>Tambahkan ulasan untuk produk : <?= $nama_produk; ?></h1>
						<div class="rating_submit">
							<div class="form-group">
							<label class="d-block">Berikan kepuasan anda</label>
							<span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating_input" value="5"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating_input" value="4"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating_input" value="3"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating_input" value="2"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating_input" value="1" checked><label for="1_star" class="rating-star"></label>
							</span>
							</div>
						</div>
						<!-- /rating_submit -->
						<div class="form-group">
							<label>Pesan ulasan</label>
							<textarea class="form-control" name="pesan_rating" style="height: 180px;" placeholder="Produk sangat bagus" required></textarea>
						</div>
						<div class="form-group">
							<label>Tambahkan gambar (opsional)</label>
							<div class="fileupload"><input type="file" name="gambar" accept="image/*"></div>
						</div>
						<!-- <a href="confirm.html" class="btn_1">Submit review</a> -->
						<button type="submit" class="btn_1">Kirim ulasan</button>
					</div>
				</form>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->