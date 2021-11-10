var base_url = 'https://localhost/busana';
$('#other_addr input').on("change", function() {
            if (this.checked)
                $('#other_addr_c').fadeIn('fast');
            else
                $('#other_addr_c').fadeOut('fast');
        });
        $(function() {
            $('#metodebank').fadeOut('fast');
            $('#pym input').change(function() {
                if ($('input:checked').val() == 'transfer') {
                    $('#metodebank').fadeIn('fast');
                } else {
                    $('#metodebank').fadeOut('fast');
                }
            });
        });

        $(document).ready(function() {
            $('#getorder').on('click', function() {
                var email = $('#email').val();
                var nama_a = $('#nama_a').val();
                var nama_b = $('#nama_b').val();
                var alamat = $('#alamat').val();
                var kodepos = $('#kodepos').val();
                var alamat_p = $('#country2').val();
                var whatsapp = $('#whatsapp').val();
                var ship_kota = $('#kota2').val();
                var ship_kecamatan = $('#kecamatan2').val();
                var keterangan = $('#keterangan').val();
                var payment = $('input[name=payment1]:checked').val();
                var metode = $('select[name=metodebank]').val();
                var subtotal = $(this).data('subtotalori');
                var shipping = $(this).data('shipping');
                var total = $(this).data('total');
                var courier = $(this).data('courier');
                var newsletter = 'not_checked';

                if ($('#newsletter').is(':checked')) {
                    var newsletter = 'is_checked';
                }

                $.ajax({
                    url: base_url + "checkout/getOrder",
                    method: "post",
                    cache: false,
                    dataType: 'json',
                    data: {
                        email: email,
                        nama_a: nama_a,
                        nama_b: nama_b,
                        alamat: alamat,
                        kodepos: kodepos,
                        alamat_p: alamat_p,
                        whatsapp: whatsapp,
                        ship_kota: ship_kota,
                        ship_kecamatan: ship_kecamatan,
                        keterangan: keterangan,
                        payment: payment,
                        metode: metode,
                        shipping: shipping,
                        total: total,
                        courier: courier,
                        newsletter: newsletter
                    },
                    beforeSend: function() {
                        $('#getorder').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.type == 'sukses') {
                            $('#getorder').html('Bayar sekarang').attr('disabled', true);
                            $('#tampil').html(data.pesan);
                            setTimeout(() => {
                                window.location = base_url + "konfirmasi";
                            }, 10000);
                        } else {
                            $('#getorder').html('Bayar sekarang').attr('disabled', false);
                            $('#tampil').html(data.pesan);
                            setTimeout(() => {
                                window.location = base_url + "checkout";
                            }, 3000);
                        }
                    }
                });

            });
        });
            $(document).ready(function() {
                $('#ship').fadeOut('fast');
            
            $('#country2').change(function() {
                var provinsi_id2 = $('#country2').val();

                if(provinsi_id2 == '') {
                $('#kota2').html('<option value="" selected>Kota/Kab</option>').attr('disabled', true);
                $('#kecamatan2').html('<option value="" selected>Kecamatan</option>').attr('disabled', true);
                $('#ship').fadeOut('fast');
                $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                $("#getorder").attr("data-shipping", "0");
                $("#getorder").attr("data-courier", "0");
                return;
            }
            $.ajax({
                url: base_url + 'checkout',
                method: 'POST',
                dataType: 'html',
                data: {
                    provinsi_id2: provinsi_id2
                },
                success: function(hasilnya) {
                    $('#kota2').html(hasilnya).attr('disabled', false);
                }
            });
          });

            $('#kota2').change(function() {
                var kota_id2 = $('#kota2').val();

            if(kota_id2 == '') {
                $('#kecamatan2').html('<option value="" selected>Kecamatan</option><br>').attr('disabled', true);
                $('#ship').fadeOut('fast');
                $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                $("#getorder").attr("data-shipping", "0");
                $("#getorder").attr("data-courier", "0");
                return;
              }

              $.ajax({
                url: base_url + 'checkout',
                method: 'POST',
                dataType: 'html',
                data: {
                    kota_id2: kota_id2
                },
                success: function(hasilnyaa) {
                    $('#kecamatan2').html(hasilnyaa).attr('disabled', false);
                }
             });
            });
            $('#spinners').hide();
            $('#kecamatan2').change(function() {
                var kecamatan_id2 = $('#kecamatan2').val();

                if (kecamatan_id2 == '') {
                    $('#ship').fadeOut('fast');
                    $('#ship').html('<select id="pengiriman"><option value="">kurir</option></select>');
                    $("#tampiltotal").html('<div class="total clearfix">TOTAL <span id="tampiltotal">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></span></div>');
                    $("#tampilhasil").html('<li class="clearfix"><em><strong>Shipping</strong></em> <span>Rp. 0</span></li>');
                    $("#getorder").attr("data-subtotalori", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-total", "<?= $this->cart->total() ?>");
                    $("#getorder").attr("data-shipping", "0");
                    $("#getorder").attr("data-courier", "0");
                    return;
                }

                $.ajax({
                url: base_url + 'checkout/getOngkir2',
                method: 'POST',
                dataType: 'html',
                data: {
                    kecamatan_id2: kecamatan_id2
                },
                beforeSend: function() {
                    $('#ship').html('<div class="sk-wave sk-center"><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div><div class="sk-wave-rect"></div></div>');
                    $('#ship').fadeIn(1000);
                },
                success: function(hasilnyaaa) {
                    $('#ship').hide();
                    $('#ship').html(hasilnyaaa);
                    $('#ship').fadeIn('fast');
                }
             });
            });
            
            $('#ship').click(function() {
            $('#pengiriman').change(function() {
                var pengiriman = $('#pengiriman').val();
                var exp = pengiriman.split("|");
                if (pengiriman == '') {
                    $("#getorder").attr("data-courier", "0");
                }
                $.ajax({
                    url: base_url + 'checkout/cekOngkir',
                    data: 'pengiriman=' + pengiriman,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg) {
                        $('#spinners').fadeOut('fast');
                        $("#tampiltotal").html(msg.total);
                        $("#tampilhasil").html(msg.shipping);
                        $("#getorder").attr("data-subtotalori", msg.subtotalori_i);
                        $("#getorder").attr("data-total", msg.total_i);
                        $("#getorder").attr("data-shipping", msg.shipping_i);
                        $("#getorder").attr("data-courier", exp[1]);
                    }
                });
            });
        });

        });