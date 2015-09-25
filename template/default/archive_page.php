<td class="content"><h1>Նորություններ</h1>
  <?php if($archive) :?>
  <?php foreach($archive as $item) :?>
  <div class="news-cat"> <span>
    <?=date("d.m.Y",$item['news_date']);?>
    </span>
    <h2> <a href="<?=SITE_URL;?>news/news_id/<?=$item['news_id'];?>">
      <?=$item['news_title'];?>
      </a> </h2>
    <p>
      <?=$item['news_anons'];?>
    </p>
    <p class="more"> <a href="<?=SITE_URL;?>news/news_id/<?=$item['news_id'];?>"> Ավելին ... </a></p>
  </div>
  <?php endforeach; ?>
  <?php if($navigation) :?>
  <ul class="pager">
    <?php if($navigation['first']) :?>
    <li class="first"> <a href="<?=SITE_URL;?>archive/page/1">Սկիզբ</a> </li>
    <?php endif; ?>
    <?php if($navigation['last_page']) :?>
    <li> <a href="<?=SITE_URL;?>archive/page/<?=$navigation['last_page']?>">&lt;</a></li>
    <?php endif; ?>
    <?php if($navigation['previous']) :?>
    <?php foreach($navigation['previous'] as $val) :?>
    <li> <a href="<?=SITE_URL;?>archive/page/<?=$val;?>">
      <?=$val;?>
      </a> </li>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php if($navigation['current']) :?>
    <li> <span>
      <?=$navigation['current'];?>
      </span> </li>
    <?php endif; ?>
    <?php if($navigation['next']) :?>
    <?php foreach($navigation['next'] as $v) :?>
    <li> <a href="<?=SITE_URL;?>archive/page/<?=$v;?>">
      <?=$v;?>
      </a> </li>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php if($navigation['next_pages']) :?>
    <li> <a href="<?=SITE_URL;?>archive/page/<?=$navigation['next_pages']?>">&gt;</a></li>
    <?php endif; ?>
    <?php if($navigation['end']) :?>
    <li class="last"> <a href="<?=SITE_URL;?>archive/page/<?=$navigation['end']?>">Վերջ</a></li>
    <?php endif; ?>
  </ul>
  <?php endif;?>
  <?php else :?>
  <p>Նորություններ առայժմ չկան</p>
  <?php endif; ?>
</td>