
<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">


<?php
// Meta Template
include "partials/meta.php"; 
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/css/styles.css">
    <link rel="stylesheet" href="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/css/Pretty-Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>

<style>
      #map {
        height: 400px;
      }
  
    </style>

<body >


 <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link"><img src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/logo-pu.png" id="logo"><strong>Puslitbang</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="index.php">Beranda </a></li>
                    <li role="presentation"><a href="index.php?p=news">Berita</a></li>
                    <li role="presentation"><a href="index.php?p=libinfo">Info</a></li>
                    <li role="presentation"><a href="index.php?p=peta" class="openPopUp" width="600" height="400">Lokasi</a></li>
                    <li role="presentation"><a href="index.php?p=member">Anggota</a></li>
                    <li role="presentation"><a href="index.php?p=gallery">Galeri</a></li>
                    <li role="presentation"><a href="index.php?p=librarian">Pustakawan</a></li>
                    <li role="presentation"><a href="index.php?p=login">Login </a></li>
                </ul>   
            </div>
        </div>
    </nav>

<!--[if lt IE 9]>
<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
<![endif]-->


<?php 
// Content
?>
<?php if(isset($_GET['search']) || isset($_GET['p'])): ?>
<section  id="content" class="s-main-page" role="main">

  <!-- Search on Front Page
  ============================================= -->
  <div class="s-main-search">
    <?php
    if(isset($_GET['p'])) {    
      switch ($_GET['p']) {
        case ''             : $page_title = __('Collections'); break;
        case 'show_detail'  : $page_title = __("Record Detail"); break;              
        case 'member'       : $page_title = __("Member Area"); break;              
        case 'member'       : $page_title = __("Member Area"); break;              
        default             : $page_title; break; }            
    } else {
      $page_title = __('Collections');  
    }
?>


    <h1 class="s-main-title animated fadeInUp delay1"><?php echo $page_title ?></h1>
    <form action="index.php" method="get" autocomplete="off">
      <input type="text" id="keyword" class="s-search animated fadeInUp delay4" name="keywords" value="" lang="<?php echo $sysconf['default_lang']; ?>" role="search">
      <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
    </form>
  </div>

  <!-- Main
  ============================================= -->
  <div class="s-main-content container">
    <div class="row">
    

      <!-- Show Result
      ============================================= -->
      <div class="col-lg-8 col-sm-9 col-xs-12 animated fadeInUp delay2">

        <?php 
          // Generate Output
          // catch empty list
          if(strlen($main_content) == 7) {
            echo '<h2>No Result</h2><hr/><p>Please try again</p>';
          } else {
            echo $main_content;
          }

          // Somehow we need to hack the layout
          if(isset($_GET['search']) || (isset($_GET['p']) && $_GET['p'] != 'member')){
            echo '</div>'; 
          } else {
            if(isset($_SESSION['mid'])) {
              echo  '</div></div>';       
            }            
          }

        ?>

      <div class="col-lg-4 col-sm-3 col-xs-12 animated fadeInUp delay4">
        <?php if(isset($_GET['search'])) : ?>
        <h2><?php echo __('Search Result'); ?></h2>
        <hr>
        <?php echo $search_result_info; ?>
        <?php endif; ?>

        <br>

        <!-- If Member Logged
        ============================================= 
        
        <h2><?php echo __('Information'); ?></h2>
        <hr/>
        <p><?php echo (utility::isMemberLogin()) ? $header_info : info; ?></p>
        <br/>
        -->

        <!-- Show if clustering search is enabled
        ============================================= -->
        <?php
          if(isset($_GET['keywords']) && (!empty($_GET['keywords']))) :
            if (($sysconf['enable_search_clustering'])) : ?>
            <h2><?php echo __('Search Cluster'); ?></h2>

            <hr/>

            <div id="search-cluster">
              <div class="cluster-loading"><?php echo __('Generating search cluster...');  ?></div>
            </div>

            <script type="text/javascript">
              $('document').ready( function() {
                $.ajax({
                  url     : 'index.php?p=clustering&q=<?php echo urlencode($criteria); ?>',
                  type    : 'GET',
                  success : function(data, status, jqXHR) { $('#search-cluster').html(data); }
                });
              });
            </script>

            <?php endif; ?>
          <?php endif; ?>
      </div>
    </div>
  </div>

</section>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">Puslitbang</a></h3>
                    <p class="links"><a href="index.php">Beranda</a><strong> · </strong><a href="index.php?p=librarian">Libary </a><strong> · </strong><a href="index.php?p=libinfo">Info </a><strong> </strong></p>
                    
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span">Jl. Ir. H. Juanda 193 </span> Bandung 40135, Indonesia</p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> (022) 2500163</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">puslitbang@company.com</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>Tentang Perusahaan</h4>
                    <p> Pusat Penelitian dan Pengembangan Sumber Daya Air adalah salah satu dari empat institusi penelitian dan pengembangan dibawah Badan Penelitian dan Pengembangan Kementerian Pekerjaan Umum dan Perumahan Rakyat.
                    </p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
            <div class="footer-about">
              <hr>                    
              <center><p class="company-name">Puslitbang © 2017 </p></center>
            </div>
        </div>
    </footer>
<?php else: ?>



<!-- Homepage
============================================= -->
 <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link"><img src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/logo-pu.png" id="logo"><strong>Puslitbang</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="index.php">Beranda </a></li>
                    <li role="presentation"><a href="index.php?p=news">Berita</a></li>
                    <li role="presentation"><a href="index.php?p=libinfo">Info</a></li>
                    <li role="presentation"><a href="index.php?p=peta" class="openPopUp" width="600" height="400">Lokasi</a></li>
                    <li role="presentation"><a href="index.php?p=member">Anggota</a></li>
                    <li role="presentation"><a href="index.php?p=gallery">Galeri</a></li>
                    <li role="presentation"><a href="index.php?p=librarian">Pustakawan</a></li>
                    <li role="presentation"><a href="index.php?p=login">Login </a></li>
                </ul>
            </div>
        </div>  
          
    </nav>
    
    <div id="promo">
    <!-- search
    ====== -->
    <form class="pull-right" action="index.php" method="get" autocomplete="off">
      <input type="text" id="keyword" class="s-search animated fadeInUp delay4" name="keywords" value="" lang="<?php echo $sysconf['default_lang']; ?>" role="search">
      <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
    </form>
        
    </div>
    <div class="container site-section" id="welcome">
        <h1 class="font-white">Selamat Datang di Katalog Online Perpustakaan Puslitbag Sumber Daya Air</h1>
        
    </div>
    <div class="dark-section">
        <div class="container site-section" id="why">
             <h1>Berita</h1>
            <div class="row">
              

              <?php
               require_once LIB.'content.inc.php';
           
               require_once SB.$sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/news_template.php';

               $page_title = __('Berita');                          

               $keywords = null;
               if (isset($_GET['keywords'])) {
                 $keywords = trim($_GET['keywords']);
               }                             

               $content = new Content();
               $total = 0;
               $content_list = $content->getContents($dbs, 3, $total, $keywords);
               
               ?>

                    <div class="col-md-15">

                <?php
               foreach ($content_list as $c) {
                  ?>
                  <div class="col-md-4">

                    <?php
                   $summary = Content::createSummary($c['content_desc'], 300);
                   echo news_list_tpl($c['content_title'], $c['content_path'], $c['last_update'], $summary);
                 ?>
                 </div>
                 <?php
               }

              ?>
               </div>  
               <?php
                echo simbio_paging::paging($total, $sysconf['news']['num_each_page'], 5);
                ?>  
            </div>
            <div class="news-readmore">
               <div class="pull-right">
                    <a class="btn btn-info btn-small" href="index.php?p=news"><?php echo __('Lihat Lebih Banyak..') ?></a>
                </div>
            </div>   
        </div>
    </div>


    <div class="container site-section" id="welcome">
        <h1>Galeri </h1>
            <div class="row">
                <?php 
                $sql = "SELECT * FROM galery ORDER BY id DESC LIMIT 3";
            
                // echo $sql_loan; //for debug purpose only
                $result = $dbs->query($sql);
                while ( $item = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4">
                        <div class="thumbnail ">
                            <a href="images/galery/'. $item['link_photo'] .'" target="_blank" data-lightbox="gambar"><img class="img-responsive" id="height" src="images/galery/'. $item['link_photo'] .'"></a>
                        </div>
                    </div>
            
                    ';
                }
                ?>
            <div class="content-readmore">
            <a class="btn btn-info btn-small" href="index.php?p=gallery"><?php echo __('Lihat Lebih Banyak..') ?></a></div>
        </div>
    </div>

    <div class="dark-section">
       <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB--m_ndjyEvbE_ELOcvc0jSGVzLRN0fzg&libraries=places" type="text/javascript" async defer></script>    
            <script>
            function initMap(){
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                            
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 17,
                                center: new google.maps.LatLng(-6.883136, 107.614251),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var infowindow = new google.maps.InfoWindow();  
                            var marker;
                                marker = new google.maps.Marker({
                                position: new google.maps.LatLng(-6.883136, 107.614251 ),
                                map: map
                                });
                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function(){
                                }})(marker, i));


                            }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                            } else {
                            }
            }
            initMap();
            </script>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <!-- <img class="pull-left image-responsive hidden-xs" src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/logo-pu.png" id="logo">// hhhhhhhhhhhhhhhhhhhhhh-->
                    <h3><a href="#">Puslitbang</a></h3>
                    <p class="links"><a href="index.php">Beranda</a><strong> · </strong><a href="index.php?p=librarian">Libary </a><strong> · </strong><a href="index.php?p=libinfo">Info </a><strong> </strong></p>
                   
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><a href="#"><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span">Jl. Ir. H. Juanda 193 </span> Bandung 40135, Indonesia</p>
                    </div>
                    <div><a href="#"><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> (022) 2500163</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">puslitbang@company.com</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>Tentang Perusahaan</h4>
                    <p> Pusat Penelitian dan Pengembangan Sumber Daya Air adalah salah satu dari empat institusi penelitian dan pengembangan dibawah Badan Penelitian dan Pengembangan Kementerian Pekerjaan Umum dan Perumahan Rakyat.
                    </p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
            <div class="footer-about">
              <hr>                    
              <center><p class="company-name">Puslitbang © 2017 </p></center>
            </div>
        </div>
    </footer>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>



<!-- end homepage 
============================================= -->


<?php endif; ?>


<?php 

// Background
include "partials/bg.php"; 
?>

<script>
  <?php if(isset($_GET['search']) && ($_GET['keywords']) != '') : ?>
  $('.biblioRecord .detail-list, .biblioRecord .title, .biblioRecord .abstract, .biblioRecord .controls').highlight(<?php echo $searched_words_js_array; ?>);
  <?php endif; ?>

  //Replace blank cover
  $('.book img').error(function(){
    var title = $(this).parent().attr('title').split(' ');
    $(this).parent().append('<div class="s-feature-title">' + title[0] + '<br/>' + title[1] + '<br/>... </div>');
    $(this).attr({
      src   : './template/default/img/book.png',  
      title : title + title[0] + ' ' + title[1]
    });
  });

  //Replace blank photo
  $('.librarian-image img').error(function(){
    $(this).attr('src','./template/default/img/avatar.jpg');
  });

  //Feature list slider
  function mycarousel_initCallback(carousel)
  {
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
      carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
      carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
      carousel.stopAuto();
    }, function() {
      carousel.startAuto();
    });
  };

  jQuery('#topbook').jcarousel({
      auto: 5,
      wrap: 'last',
      initCallback: mycarousel_initCallback
  });

$(window).scroll(function() {    
  console.log($(window).scrollTop());
  if ($(window).scrollTop() > 50) {
    $('.s-main-search').removeClass("animated fadeIn").addClass("animated fadeOut");
  } else {
    $('.s-main-search').removeClass("animated fadeOut").addClass("animated fadeIn");
  }  
});

</script>

</body>
</html>