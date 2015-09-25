<div class="footer-main">
				<div class="footer">
					<div class="ftrMenu">
						<div class="phone">
							+374 (95) <span>188-733</span><br>
							+374 (96) <span>188-733</span> 
						</div>
						<p><a href="<?=SITE_URL;?>">Գլխավոր</a> | 
						<?php if($pages) :?>
							<?php foreach($pages as $page) :?>
							<a href="<?=SITE_URL;?>page/page_id/<?=$page['page_id']?>"><?=$page['page_title']?></a> |
							<?php endforeach; ?>
						<?php endif;?>
						<a href="<?=SITE_URL;?>archive">Նորություններ</a> | <a href="<?=SITE_URL;?>catalog">Կատալոգ</a>
					</div>
					<div class="copy">
						© 2015 “Արմ-Շին-Էներգո” ՍՊԸ<br>
						Բոլոր իրավունքները պաշտպանված են<br>
                        Powered by <a href="http://g-servicing.com/" title="G-Servicing">G-Servicing</a>
					</div>
				</div>
			</div>	
	</div>
</div>
</div>
</body>
</html>