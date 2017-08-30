<?php
$page_title = __('Gallery');
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include_once '../../sysconfig.inc.php';
}
?>
<div class="container site-section" id="welcome">

<div class="row">


<?php 
    $sql = "SELECT * FROM galery";

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
    //echo $result->fetch_assoc(); 
    
?>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo $sysconf['template']['dir']; ?> /default/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>

           
           
        </div>
    </div>
   