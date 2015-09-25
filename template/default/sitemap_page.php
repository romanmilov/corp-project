<td class="content">
	<h1>Կայքի քարտեզ</h1>
      <?php if($pages && $catalog) :?>
  <ul>
    <li> <a href="<?=SITE_URL;?>">Գլխավոր</a> </li>
    <li> <a href="<?=SITE_URL;?>archive">Նորություններ</a> </li>
    <?php foreach($pages as $item) :?>
    <li> <a href="<?=SITE_URL;?>page/page_id/<?=$item['page_id']?>">
      <?=$item['title']?>
      </a> </li>
    <?php endforeach;?>
    <li> <a href="<?=SITE_URL;?>catalog">Ապրանքների կատալոգ</a> </li>
    <ul>
      <?php foreach($catalog as $key=>$val) :?>
      <?php if($val['next_lvl']) :?>
      <li> <a href="<?=SITE_URL;?>catalog/parent_id/<?=$key;?>">
        <?=$val[0]?>
        </a>
        <ul>
          <?php foreach($val['next_lvl'] as $k=>$v) :?>
          <li> <a href="<?=SITE_URL;?>catalog/brand_id/<?=$k?>">
            <?=$v;?>
            </a> </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php else :?>
      <li> <a href="<?=SITE_URL;?>catalog/brand_id/<?=$key?>">
        <?=$val[0];?>
        </a> </li>
      <?php endif;?>
      <?php endforeach;?>
    </ul>
  </ul>
  <?php else :?>
  <p>Կաձքի քարտեզի մասին տվյալներ չեն գտնվել</p>
  <?php endif;?></td>