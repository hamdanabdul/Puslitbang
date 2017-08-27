<?php
/**
 * Copyright (C) 2007,2008  Arie Nugraha (dicarve@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
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
 *
 */

/* Stock Take */

// key to authenticate
define('INDEX_AUTH', '1');

if (!defined('SB')) {
  // main system configuration
  require '../../../sysconfig.inc.php';
  // start the session
  require SB.'admin/default/session.inc.php';
}
// IP based access limitation
require LIB.'ip_based_access.inc.php';
do_checkIP('smc');
do_checkIP('smc-galeri');

require SB.'admin/default/session_check.inc.php';
require SIMBIO.'simbio_GUI/table/simbio_table.inc.php';
require SIMBIO.'simbio_GUI/form_maker/simbio_form_table_AJAX.inc.php';
require SIMBIO.'simbio_GUI/paging/simbio_paging.inc.php';
require SIMBIO.'simbio_DB/datagrid/simbio_dbgrid.inc.php';
require SIMBIO.'simbio_DB/simbio_dbop.inc.php';

// privileges checking
$can_read = utility::havePrivilege('galeri', 'r');
$can_write = utility::havePrivilege('galeri', 'w');

if (!$can_read) {
  die('<div class="errorBox">'.__('You don\'t have enough privileges to access this area!').'</div>');
}
?>
<fieldset class="menuBox">
<div class="menuBoxInner stockTakeIcon">
	<div class="per_title">
	  <h2><?php echo __('Galeri'); ?></h2>
  </div>
	<div class="sub_section">
    <form name="search" action="<?php echo MWB; ?>galeri/index.php" id="search" method="get" style="display: inline;"><?php echo __('Search'); ?> :
    <input type="text" name="keywords" size="30" />
    <input type="submit" value="<?php echo __('Search'); ?>" class="btn btn-default" />
    </form>
  </div>
</div>
</fieldset>
<?php
if (isset($_POST['galeri_id']) AND !empty($_POST['galeri_id'])) {
    $galeri_id = (integer)$_POST['galeri_id'];
    $rec_q = $dbs->query("SELECT
        galeri_name AS '".__('Galeri')."',
        galeri_img AS '".__('Gambar')."',
        date AS '".__('Date')."';

    $rec_d = $rec_q->fetch_assoc();
    
    // create table object
    $table = new simbio_table();
    $table->table_attr = 'align="center" class="border" cellpadding="5" cellspacing="0"';
    // table header
    $table->setHeader(array($rec_d[__('Galeri')]));
    $table->table_header_attr = 'class="dataListHeader" colspan="3"';
    // initial row count
    $row = 1;
    foreach ($rec_d as $headings => $stk_data) {
        if ($headings == 'galeri_id') {
            continue;
        } else if ($headings == __('Status')) {
            if ($stk_data == '1') {
                $stk_data = '<b style="color: #f00;">'.__('Currently Active').'</b>';
            } else {
                $stk_data = 'Finished';
            }
        }
        $table->appendTableRow(array($headings, ':', $stk_data));
        // set cell attribute
        $table->setCellAttr($row, 0, 'class="alterCell" valign="top" style="width: 170px;"');
        $table->setCellAttr($row, 1, 'class="alterCell" valign="top" style="width: 1%;"');
        $table->setCellAttr($row, 2, 'class="alterCell2" valign="top" style="width: auto;"');
        // add row count
        $row++;
    }
    // print out table
    echo $table->printTable();
} else { 
    /* STOCK TAKE HISTORY LIST  */
    // table spec
    $table_spec = 'galeri';

    // create datagrid
    $datagrid = new simbio_datagrid();
    $datagrid->setSQLColumn('galeri_id',
        'galeri_name AS \''.__('Galeri Name').'\'',
        'date AS \''.__('Date').'\'',

    $datagrid->setSQLorder('st.start_date DESC');
    $datagrid->disableSort('Report');

    // is there any search
    if (isset($_GET['keywords']) AND $_GET['keywords']) {
        $keyword = $dbs->escape_string(trim($_GET['keywords']));
        $words = explode(' ', $keyword);
        if (count($words) > 1) {
            $concat_sql = ' (';
            foreach ($words as $word) {
                $concat_sql .= " (galeri_name LIKE '%$word%' OR init_user LIKE '%$word%') AND";
            }
            // remove the last AND
            $concat_sql = substr_replace($concat_sql, '', -3);
            $concat_sql .= ') ';
            $datagrid->setSQLCriteria($concat_sql);
        } else {
            $datagrid->setSQLCriteria("galeri_name LIKE '%$keyword%' OR init_user LIKE '%$keyword%'");
        }
    }
*/
    // set table and table header attributes
    $datagrid->icon_edit = $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/edit.gif';
    $datagrid->table_attr = 'align="center" id="dataList" cellpadding="5" cellspacing="0"';
    $datagrid->table_header_attr = 'class="dataListHeader" style="font-weight: bold;"';
    $datagrid->chbox_property = false;
    // set delete proccess URL
    $datagrid->delete_URL = $_SERVER['PHP_SELF'];

    // put the result into variables
    $datagrid_result = $datagrid->createDataGrid($dbs, $table_spec, 20, true);
    if (isset($_GET['keywords']) AND $_GET['keywords']) {
        $msg = str_replace('{result->num_rows}', $datagrid->num_rows, __('Found <strong>{result->num_rows}</strong> from your keywords')); //mfc
        echo '<div class="infoBox">'.$msg.' : "'.$_GET['keywords'].'"</div>';
    }

    echo $datagrid_result;
}
