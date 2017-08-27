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
            <a href="#7" target="_blank" data-lightbox="gambar"><img class="img-responsive" id="height" src="images/galery/'. $item['link_photo'] .'"></a>
        </div>
    </div>

        ';

       
    }
    //echo $result->fetch_assoc(); 
    
?>

           
           
        </div>
    </div>
    <!-- choose file gambar 
    ======================
    <div>
        <hr>
        <label>Foto</label>
        <label>:</label>
        <input type="file" class="textbox" name="gambar"> 
        <input type="submit" value="submit" >               
    </div> -->