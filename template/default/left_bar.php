<td class="nav">

					<div class="links">

						<a href="<?=SITE_URL;?>"><img src="<?=SITE_URL.VIEW;?>images/home.gif" alt="Գլխավոր" title="Գլխավոր"></a>

						<a href="<?=SITE_URL;?>contacts"><img src="<?=SITE_URL.VIEW;?>images/kontakts.gif" alt="Հետադարձ կապ" title="Հետադարձ կապ"></a>

						<a href="<?=SITE_URL;?>map"><img src="<?=SITE_URL.VIEW;?>images/amp.gif" alt="Կայքի քարտեզ" title="Կայքի քարտեզ"></a>

					</div>

					<ul class="navigation">

						<li>&mdash;&nbsp; <a href="<?=SITE_URL;?>archive">Նորություններ</a></li>

						<?php if($pages) :?>

							<?php foreach($pages as $item) :?>

						<li>&mdash;&nbsp; <a href="<?=SITE_URL;?>page/page_id/<?=$item['page_id']?>"><?=$item['page_title']?></a></li>

							<?php endforeach;?>

						<?php endif;?>

						<li>&mdash;&nbsp; <a href="<?=SITE_URL;?>catalog">Ապրանքների Կատալոգ</a></li>

					</ul>

					<div id="katalog">

						<div id="select">

							<a id="header_catalog_type" href="#" class="selec_activ">Ըստ տեսակի</a>|

                            <a id="header_catalog_brand" href="#" class="selec">Ըստ կատեգորիայի</a> 

						</div>

						<?php if($types) :?>

						<div id="list_type">

							<?php foreach($types as $item_t) :?>

								<a href="<?=SITE_URL;?>catalog/type/<?=$item_t['type_id']?>"><?=$item_t['type_name']?></a><br />	

							<?php endforeach; ?>

						</div>

						<?php endif;?>

						

						<?php if($brands) :?>

								<div id="list_brands">

									<?php foreach($brands as $key=>$item_b) :?>

											<?php if($item_b['next_lvl']) :?>

											<p><a href="#"><?=$item_b[0];?></a></p>

											<div>

											<a href="<?=SITE_URL;?>catalog/parrent/<?=$key;?>">Բոլորը</a><br />

											<?php foreach($item_b['next_lvl'] as $k=>$v) :?>

												<a href="<?=SITE_URL;?>catalog/brand/<?=$k?>"><?=$v;?></a><br />

											<?php endforeach; ?>

											

											</div>

											<?php else : ?>

											<a href="<?=SITE_URL;?>catalog/brand/<?=$key;?>"><?=$item_b['0']?></a><br />

											<?php endif;?>

									<?php endforeach; ?>

								</div>

						<?php endif;?>
<!--
					<div class="pricelist">

						<a href="#"><strong>Ներբեռնել Գնացուցակը</strong></a><br> 

						(367 Կբ, MS Excel)

					</div>
-->
				</td>