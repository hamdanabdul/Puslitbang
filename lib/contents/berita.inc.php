<?php
require_once LIB.'content.inc.php';
require SIMBIO.'simbio_GUI/paging/simbio_paging.inc.php';
require_once SB.$sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/news_template.php';

$page_title = __('Berita');

$keywords = null;
if (isset($_GET['keywords'])) {
  $keywords = trim($_GET['keywords']);
}

$content = new Content();
$total = 0;
$content_list = $content->getContents($dbs, 10, $total, $keywords);
if ($total > 0) {
  echo '<div class="alert alert-info">'.__(sprintf('We have %d news for you!', $total)).'</div>';  
} else {
  echo '<div class="alert alert-warning">'.__('Sorry, we don\'t have any news for you yet.').'</div>';  
}


foreach ($content_list as $c) {
    $summary = Content::createSummary($c['content_desc'], 300);
    echo news_list_tpl($c['content_title'], $c['content_path'], $c['last_update'], $summary);
}

echo simbio_paging::paging($total, $sysconf['news']['num_each_page'], 5);