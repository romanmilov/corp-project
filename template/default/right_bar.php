<td class="news">
<h1>Նորություններ</h1>
  <?php if($news) : ?>
  <?php foreach($news as $item) :?>
  <div> <span>
    <?=date("d.m.Y",$item['news_date']);?>
    </span>
    <h2> <a href="<?=SITE_URL;?>news/news_id/<?=$item['news_id'];?>"> <strong>
      <?=$item['news_title'];?>
      </strong> </a> </h2>
    <p>
      <?=$item['news_anons']?>
    </p>
  </div>
  <?php endforeach; ?>
  <?php else : ?>
  <p>Նորություններ առայժմ չկան</p>
  <?php endif; ?>
  <a class="arhiv-news" href="<?=SITE_URL;?>archive">Նորությունների արխիվ</a>
</td>
