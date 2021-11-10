<main>
	
		
	<div class="container margin_60_35">
	
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="write_review">
						<h1>Cek ongkir anda sebelum mengorder</h1>
						<label class="d-block">Harga ongkir dihitung per 1kg</label>
						<div class="form-group">
							<label>Provinsi *</label>
							<select class="form-control" name="provinsi" id="provinsi">
								<option value="" selected>Provinsi</option>
								<?php foreach($provinsi->result() as $data) : ?>
								<option value="<?= $data->province_id ?>"><?= $data->province; ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Kota/Kabupaten</label>
							<select class="form-control" name="kota" id="kota" disabled>
								<option value="" selected>Pilih kota</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan" disabled>
								<option value="" selected>Pilih kecamatan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kurir</label>
							<select class="form-control" name="kurir" id="kurir" disabled>
								<option value="" selected>Pilih kurir</option>
								<option value="jne">JNE</option>
								<option value="jnt">J&T</option>
								<option value="pos">POS INDONESIA</option>
								<option value="sicepat">SICEPAT</option>
							</select>
						</div>
						<div class="form-group hasilcek"> 
						
						</div>

						<a href="javascript:void(0);" class="btn_1" id="cekongkir1">Cekongkir</a>
					</div>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->