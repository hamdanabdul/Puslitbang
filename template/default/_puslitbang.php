<?php
/**
 * Template for OPAC
 *
 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
 * 
 * Slims 8 (Akasia)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

// be sure that this file not accessed directly

if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
} 

?>

<!DOCTYPE html>
<html>

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

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#"><img src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/logo-pu.png" id="logo"><strong>Puslitbang</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="">Beranda </a></li>
                    <li role="presentation"><a href="index.php?p=libinfo">Libary News</a></li>
                    <li role="presentation"><a href="#">Info Perpustakaan</a></li>
                    <li role="presentation"><a href="#">Area Anggota</a></li>
                    <li role="presentation"><a href="index.php?p=login">Login </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="promo">
        <div class="jumbotron">
            <h1>Hello!! </h1>
            <p>You know you’ve read a good book when you turn the last page and feel a little as if you have lost a friend </p>
            <p><a class="btn btn-info btn-lg" role="button" href="#">Silahkan </a></p>
        </div>
    </div>
    <div class="container site-section" id="welcome">
        <h1>Welcome to Pusat Penelitian dan Pengembangan Sumber Daya Air</h1>
        <p>Pusat Penelitian dan Pengembangan Sumber Daya Air adalah salah satu dari empat institusi penelitian dan pengembangan dibawah Badan Penelitian dan Pengembangan Kementerian Pekerjaan Umum dan Perumahan Rakyat. </p>
    </div>
    <div class="dark-section">
        <div class="container site-section" id="why">
            <h1>Why Choose US</h1>
            <div class="row">
                <div class="col-md-4 item"><i class="glyphicon glyphicon-book"></i>
                    <h2>Quotes </h2>
                    <p>mencoba yang lebih baik dari pada sebelumnya dan berusahalah semaksimal mungkin untuk mencapai kesuksesan.</p>
                </div>
                <div class="col-md-4 item"><i class="glyphicon glyphicon-tag"></i>
                    <h2>Pinnest </h2>
                    <p>mencoba yang lebih baik dari pada sebelumnya dan berusahalah semaksimal mungkin untuk mencapai kesuksesan.</p>
                </div>
                <div class="col-md-4 item"><i class="fa fa-heart"></i>
                    <h2>Health </h2>
                    <p>mencoba yang lebih baik dari pada sebelumnya dan berusahalah semaksimal mungkin untuk mencapai kesuksesan.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container site-section" id="welcome">
        <h1>Gallery </h1>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="background.jpg" target="_blank" data-lightbox="gambar"><img class="img-responsive" src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/background.jpg"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="foto.jpg" target="_blank" data-lightbox="gambar"><img class="img-responsive" src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/foto.jpg"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="lomba.png" target="_blank" data-lightbox="gambar"><img class="img-responsive" src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/img/lomba.png"></a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">Puslitbang</a></h3>
                    <p class="links"><a href="#">Beranda</a><strong> · </strong><a href="#">Libary </a><strong> · </strong><a href="#">Info </a><strong> </strong></p>
                    <p class="company-name">puslitbang © 2015 </p>
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> +1 555 123456</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">support@company.com</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>About the company</h4>
                    <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                    </p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
</body>

</html>


















<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>

<?php
// Meta Template
include "partials/meta.php"; 
?>

</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<!--[if lt IE 9]>
<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
<![endif]-->

<?php
// Header
include "partials/header.php"; 
?>

<?php 
// Navigation
include "partials/nav.php"; 
?>

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
        ============================================= -->
        <h2><?php echo __('Information'); ?></h2>
        <hr/>
        <p><?php echo (utility::isMemberLogin()) ? $header_info : $info; ?></p>
        <br/>

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

<?php else: ?>

<!-- Homepage
============================================= -->
<main id="content" class="s-main" role="main">

    <!-- Search form
    ============================================= -->
    <div class="s-main-search animated fadeInUp delay1">
      <form action="index.php" method="get" autocomplete="off">
        <h1 class="animated fadeInUp delay2"><?php echo __('SEARCHING'); ?></h1>
        <div class="marquee down">
          <p class="s-search-info">
          <?php echo __('start it by typing one or more keywords for title, author or subject'); ?>
          <!--
          <?php echo __('use logical search "title=library AND author=robert"'); ?>
          <?php echo __('just click on the Search button to see all collections'); ?>
          -->
          </p>
        </div>
        <input type="text" class="s-search animated fadeInUp delay4" id="keyword" name="keywords" value="" lang="<?php echo $sysconf['default_lang']; ?>" aria-hidden="true" autocomplete="off">
        <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
        <div id="fkbx-spch" tabindex="0" aria-label="Telusuri dengan suara" style="display: block;"></div>
      </form>
    </div>

<?php endif; ?>

</main>


<?php 
// Footer
include "partials/footer.php"; 

// Chat Engine
include LIB."contents/chat.php"; 

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