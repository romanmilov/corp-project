<td class="content">
				
						<h1>
							Ապրանքների կատալոգ
						</h1>
						
						<?php if($krohi) :?>
						<div class="kat_map">			
						<?php if(count($krohi) > 1) :?>
						<a href="<?=SITE_URL?>">Գլխավոր</a> /
						<a href="<?=SITE_URL?>catalog/parrent/<?=$krohi[0]['brand_id'];?>"><?=$krohi[0]['brand_name'];?></a> /
						<span><?=$krohi[1]['brand_name'];?></span>
						
<?php elseif(count($krohi) == 1 && array_key_exists('type_name',$krohi[0])) :?>
<a href="<?=SITE_URL?>">Գլխավոր</a> /
<span><?=$krohi[0]['type_name'];?></span>

<?php elseif(count($krohi) == 1 && array_key_exists('brand_name',$krohi[0])) :?>
<a href="<?=SITE_URL?>">Գլխավոր</a> /
<span><?=$krohi[0]['brand_name'];?></span>
						<? endif;?>
						</div>	
						<?endif;?>
						
						<?php if($catalog) :?>
						<?php
						$i = 1;
						?>
							<?php foreach($catalog as $key=>$item) :?>
								<div class="product-cat-main">
								<?php if($i == 3) :?>
									<div class="product-cat-third">
									<? $i = 0;?>
								<?php else :?>
									<div class="product-cat">
								<?php endif;?>
								
									<a href="<?=SITE_URL?>product/id/<?=$item['product_id'];?>">
										<img src="<?=SITE_URL.UPLOAD_DIR.$item['product_img'];?>" alt="<?=$item['product_title']?>" />
									</a>
									<a href="<?=SITE_URL?>product/id/<?=$item['product_id'];?>">
										<?=$item['product_title']?>
									</a>
								</div>
								<div class="bord-bot"></div>
							</div>
							<?php $i++;?>
							<?php endforeach;?>
							<div class="clr"></div>
							<?php if($navigation) :?>
							<br />
							<ul class="pager">
								<?php if($navigation['first']) :?>
									<li class="first">
										<a href="<?=SITE_URL;?>catalog/page/1<?=$previous?>">Սկիզբ</a>
									</li>
								<?php endif; ?>
								
								<?php if($navigation['last_page']) :?>
									<li>
										<a href="<?=SITE_URL;?>catalog/page/<?=$navigation['last_page']?><?=$previous?>">&lt;</a>
									</li>
								<?php endif; ?>
								
								<?php if($navigation['previous']) :?>
									<?php foreach($navigation['previous'] as $val) :?>
										<li>
											<a href="<?=SITE_URL;?>catalog/page/<?=$val;?><?=$previous?>"><?=$val;?></a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							
							<?php if($navigation['current']) :?>
									<li>
										<span><?=$navigation['current'];?></span>
									</li>
								<?php endif; ?>
								
							<?php if($navigation['next']) :?>
									<?php foreach($navigation['next'] as $v) :?>
										<li>
											<a href="<?=SITE_URL;?>catalog/page/<?=$v;?><?=$previous?>"><?=$v;?></a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php if($navigation['next_pages']) :?>
									<li>
										<a href="<?=SITE_URL;?>catalog/page/<?=$navigation['next_pages']?><?=$previous?>">&gt;</a>
									</li>
								<?php endif; ?>	
								
							<?php if($navigation['end']) :?>
									<li class="last">
										<a href="<?=SITE_URL;?>catalog/page/<?=$navigation['end']?><?=$previous?>">Վերջ</a>
									</li>
								<?php endif; ?>		
									
							</ul>
							<?php endif;?>
							
						<?php else :?>
							<p>Այս բաժնում դեռևս ապրանքներ չկան</p>
						<?php endif;?>				
						
				</td>