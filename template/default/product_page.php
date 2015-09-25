<td class="content">
<?php if($product) :?>
	<h1>
		<?=$product['product_title']?>
	</h1>
    <div class="kat_map">
						
<? if(count($krohi) == 1) :?>
<a href="<?=SITE_URL?>">Գլխավոր</a> /
<span><?=$krohi[0]['product_title'];?></span>

						<? endif;?>
						</div>
		
	<p>
		<img src="<?=SITE_URL.UPLOAD_DIR.$product['product_img'];?>" />
	</p>
	<p><?=$product['product_content']?></p>
<?php else: ?>
<p>Այդպիսի պարամետրերով ապրանք գոյություն չունի</p>
<?php endif; ?>
<p class="more"><a href="<?=SITE_URL;?>catalog">Բոլոր ապրանքները ...</a></p>
						
				</td>