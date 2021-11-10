<main>

	

		

	<div class="container margin_60_35">

	

			<div class="row justify-content-center">

				<div class="col-lg-8">

					<div class="write_review">

						<h1>Konfirmasi pembayaran</h1>

						<?= $this->session->flashdata('message'); ?>

						<form action="<?= base_url() ?>konfirmasi" method="post" enctype="multipart/form-data">

						<div class="form-group">

							<label>Id invoice*</label>

							<input class="form-control" name="invoice" type="text" placeholder="contoh: DFGTRE263" autocomplete="off" value="<?= set_value('invoice'); ?>">

							<?= form_error('invoice', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Alamat email*</label>

							<input class="form-control" name="email" type="text" placeholder="contoh: email@gmail.com" value="<?= set_value('email'); ?>">

							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Nama lengkap*</label>

							<input class="form-control" autocomplete="off" name="nama" type="text" placeholder="contoh: Candra sutiawan" value="<?= set_value('nama'); ?>">

							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Nama pemilik rekening*</label>

							<input class="form-control" autocomplete="off" name="rekening" type="text" placeholder="contoh: Dede maryani 27347478388" value="<?= set_value('rekening'); ?>">

							<?= form_error('rekening', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Ke BANK*</label>

							<select name="bank" class="form-control">

								<option value="" selected>Pilih</option>

								<option value="bri">Bank BRI</option>

								<option value="bni">Bank BNI</option>
								<option value="bca">Bank BCA</option>

								<option value="mandiri">Bank MANDIRI</option>

							</select>

							<?= form_error('bank', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Jumlah pembayaran Rp.*</label>

							<input class="form-control" name="jumlah" type="number" placeholder="contoh: 300000" value="<?= set_value('jumlah'); ?>">

							<?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Tgl pembayaran*</label>

							<input class="form-control" autocomplete="off" name="tanggal" type="text" placeholder="contoh: 21 july 2020" value="<?= set_value('tanggal'); ?>">

							<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>

						<div class="form-group">

							<label>Keterangan (opsional)</label>

							<textarea class="form-control" style="height: 180px;" placeholder="(opsional)" name="keterangan"></textarea>

						</div>

						<div class="form-group">

							<label>Upload bukti (opsional)</label>

							<div class="fileupload"><input type="file" name="bukti_gambar"></div>

						</div>

						<button type="submit" class="btn_1">Kirim</button>

						</form>

					</div>

				</div>

		</div>

		<!-- /row -->

		</div>

		<!-- /container -->

	</main>

	<!--/main-->