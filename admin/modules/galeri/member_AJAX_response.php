<?php
/**
 * Copyright (C) 2007,2008  Arie Nugraha (dicarve@yahoo.com)
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
 *
 */

// key to authenticate
define('INDEX_AUTH', '1');

sleep(1);
require '../../../sysconfig.inc.php';
// IP based access limitation
require LIB.'ip_based_access.inc.php';
do_checkIP('smc');
do_checkIP('smc-galeri');
require SB.'admin/default/session.inc.php';

// get search value
if (isset($_POST['inputSearchVal'])) {
    $searchVal = $dbs->escape_string(trim($_POST['inputSearchVal']));
} else {
    $json_array[] = '';
    echo json_encode($json_array);
    exit();
}
// query to database
$galeri_q = $dbs->query("SELECT galeri_id, galeri_name
    FROM galeri WHERE galeri_id LIKE '%$searchVal%' OR galeri_name LIKE '%$searchVal%' LIMIT 10");
if ($galeri_q->num_rows < 1) {
    $json_array[] = 'NO DATA FOUND';
    echo json_encode($json_array);
    exit();
}

// loop data
while ($galeri_d = $galeri_q->fetch_row()) {
    $json_array[] = $galeri_d[0].' &lt;'.$galeri_d[1].'&gt;';
}
// encode to JSON array
if (!function_exists('json_encode')) {
    echo json_encode($json_array);
    exit();
}

echo json_encode($json_array);
