<div class="container mobile-wrap">
	<div class="cart-wrapp">
		<h1 class="page-title"><?php echo __('Cart','Ferina');?></h1>
		<?php
			if ($_SESSION['keranjang'] == null) {
				 echo __('Empty Shopping Cart','Ferina');
			}else{
				$keranjang = $_SESSION['keranjang'];
				$ker_arrs = unserialize($keranjang);
				$subTot = array();
				$subTot1 = array();
				foreach ($ker_arrs as $key => $val) {
					$posts = get_post($val['id']); 
					$title = $posts->post_title; 
					$image_url = $posts->get_the_post_thumbnail;
					
					$subTot[] = (int)get_post_meta($val['id'], 'mtb_harga_satuan_retail', true)*(int)$val['jumlah'];

					if ($val['type'] == 'retail') {
						$subTotal = (int)get_post_meta($val['id'], 'mtb_harga_satuan_retail', true)*(int)$val['jumlah'];
						$harga = (int)get_post_meta($val['id'], 'mtb_harga_satuan_retail', true);
					}else{
						if ($val['jumlah'] < 10) {
							$subTotal = (int)get_post_meta($val['id'], 'mtb_harga_grossir_5_item', true)*(int)$val['jumlah'];
							$subTot1[] = (int)get_post_meta($val['id'], 'mtb_harga_grossir_5_item', true)*(int)$val['jumlah'];
							$harga = (int)get_post_meta($val['id'], 'mtb_harga_grossir_5_item', true);
						}else if ($val['jumlah'] < 20) {
							$subTotal = (int)get_post_meta($val['id'], 'mtb_harga_grossir_10_item', true)*(int)$val['jumlah'];
							$subTot1[] = (int)get_post_meta($val['id'], 'mtb_harga_grossir_10_item', true)*(int)$val['jumlah'];
							$harga = (int)get_post_meta($val['id'], 'mtb_harga_grossir_10_item', true);
						}else if ($val['jumlah'] < 40) {
							$subTotal = (int)get_post_meta($val['id'], 'mtb_harga_grossir_1_kodi', true)*(int)$val['jumlah'];
							$subTot1[] = (int)get_post_meta($val['id'], 'mtb_harga_grossir_1_kodi', true)*(int)$val['jumlah'];
							$harga = (int)get_post_meta($val['id'], 'mtb_harga_grossir_1_kodi', true);
						}else {
							$subTotal = (int)get_post_meta($val['id'], 'mtb_harga_grossir_2_kodi', true)*(int)$val['jumlah'];
							$subTot1[] = (int)get_post_meta($val['id'], 'mtb_harga_grossir_2_kodi', true)*(int)$val['jumlah'];
							$harga = (int)get_post_meta($val['id'], 'mtb_harga_grossir_2_kodi', true);
						}
					}
		?>
					<div class="mlist-belanjaan">
						<div class="separoh">
							<div class="wrap-imagecart">
								<img alt="Ferina" src="<?php bloginfo('template_url');?>/lib/img/thumb2.jpg">
							</div>
						</div>
						<div class="separoh">
							<div class="wrap-textcart">
								<p>Nama Produk   <span><?php echo $title; ?></span></p>
								<?php if($val['type'] == 'retail'){ ?>
										<p><span><?php echo __('Type','Ferina');?> <b><?php echo $val['type']; ?></b></span></p>
										<p><span><?php echo __('Color','Ferina');?> <b><?php echo $val['warna']; ?></b></span></p>
										<p><span><?php echo __('Size','Ferina');?> <b><?php echo $val['size']; ?></b></span></p>
								<?php }else{ ?>
									<span><?php echo __('Type','Ferina');?> <b><?php echo $val['type']; ?></b></span>
								<?php } ?>
								<p><?php echo __('Total','Ferina');?> <span><?php echo $val['jumlah']; ?></span></p>
								<p><?php echo __('Unit Price','Ferina');?> <span><?php echo currency($harga); ?></span></p>
								<p><?php echo __('Sub-Total','Ferina');?></p>
								<p><strong><?php echo currency($subTotal); ?></strong></span></p>
								<a href="?key=<?php echo $key; ?>&action=hapus&ket=sip" class="remove-item"><?php echo __('Delete','Ferina');?> x</a>
							</div>
							<div class="cart-plus">
							
							</div>
						</div>
					</div>
			<?php 
				} 
				$jum_bel = array_sum($subTot);
				$jum_bel1 = array_sum($subTot1);

				$tot_jumbel = $jum_bel+$jum_bel1;
				$jum = count($ker_arrs);
			?>
			<div class="mtotal-belanjaan">
				<div class="separoh">
					<a class="keproduk-m" href="/product"><?php echo __('Next Shopping','Ferina');?></a> 
				</div>
				<div class="separoh">
					<div class="text-total">
						<p>Sub Total ( <?php echo $jum; ?> item )<span> <?php echo currency($tot_jumbel); ?></span></p>
						<p><span>PPN</span> <span><?php echo currency(0); ?></span></p>
						<p><span>Total</span> <span><?php echo currency($tot_jumbel); ?></span></p>
						<p><input class="end-mshoping" type="button" value="<?php echo __('Order','Ferina');?>"></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
