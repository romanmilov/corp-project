<td class="content">
	<h1>Որոնման Արդյունքները</h1>
		<div class="kat_map">
			<a href="<?=SITE_URL;?>">Գլխավոր</a> / <span>Որոնման արդյունքները </span>
		</div>	
        
		<?php if($search): ?>
        <?php $i = 1; ?>
        <?php foreach($search as $key=>$item) :?>
        <div class="product-cat-main">
			<?php if($i == 3) :?>
				<div class="product-cat-third">
				<?php $i = 0;?>
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
		<ul class="pager">
		<?php if($navigation['first']) :?>
		<li class="first">
			<a href="<?=SITE_URL;?>search/page/1/str/<?=$str;?>">Սկիզբ</a>
		</li>
		<?php endif; ?>
        <?php if($navigation['last_page']) :?>
		<li>
			<a href="<?=SITE_URL;?>search/page/<?=$navigation['last_page']?>/str/<?=$str?>">&lt;</a>
		</li>
		<?php endif; ?>
		<?php if($navigation['previous']) :?>
		<?php foreach($navigation['previous'] as $val) :?>
		<li>
			<a href="<?=SITE_URL;?>search/page/<?=$val;?>/str/<?=$str?>"><?=$val;?></a>
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
			<a href="<?=SITE_URL;?>search/page/<?=$v;?>/str/<?=$str?>"><?=$v;?></a>
		</li>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php if($navigation['next_pages']) :?>
		<li>
			<a href="<?=SITE_URL;?>search/page/<?=$navigation['next_pages']?>/str/<?=$str?>">&gt;</a>
		</li>
		<?php endif; ?>
        <?php if($navigation['end']) :?>
		<li class="last">
			<a href="<?=SITE_URL;?>search/page/<?=$navigation['end']?>/str/<?=$str?>">Վերջ</a>
		</li>
		<?php endif; ?>		
		</ul>
		<?php endif;?>								
		<?php else :?>
		<p>Որոնումը արդյունք չտվեց</p>
		<?php endif;?>
</td>