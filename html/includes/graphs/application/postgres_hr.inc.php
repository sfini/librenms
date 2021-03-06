<?php
$name = 'postgres';
$app_id = $app['app_id'];
$scale_min     = 0;
$colours       = 'mixed';
$unit_text     = 'Per Second';
$unitlen       = 10;
$bigdescrlen   = 15;
$smalldescrlen = 15;
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 15;


if (isset($vars['database'])) {
    $rrd_name_array=array('app', $name, $app_id, $vars['database']);
} else {
    $rrd_name_array=array('app', $name, $app_id);
}

$rrd_filename = rrd_name($device['hostname'], $rrd_name_array);

if (is_file($rrd_filename)) {
    $rrd_list = array(
        array(
            'filename' => $rrd_filename,
            'descr'    => 'Blocks Read',
            'ds'       => 'read',
            'colour'   => 'AA5439'
        ),
        array(
            'filename' => $rrd_filename,
            'descr'    => 'Buffer Hits',
            'ds'       => 'hit',
            'colour'   => '28774F'
        )
    );
} else {
    echo "file missing: $rrd_filename";
}


require 'includes/graphs/generic_v3_multiline.inc.php';
