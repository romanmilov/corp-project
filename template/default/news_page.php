<td class="content">
<?php if($news_text) :?>
	<h1><?=$news_text['news_title'];?></h1>					
	<span class="news-date"><?=date("d.m.Y",$news_text['news_date']);?></span>					
	<p><?=$news_text['news_content'];?></p>
<?php else :?>
<p>Այդպիսի պարամետրով նորություն գոյություն չունի</p>
<?php endif; ?>					
<p class="more"><a href="<?=SITE_URL;?>archive">Բոլոր նորությունները ...</a></p>
</td>