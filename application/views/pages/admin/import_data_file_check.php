<h3>Import Check</h3>
<?php
//
// This form is used to select a file to import and a table to import to
//
$this->load->helper(array('form', 'url'));
//
//print_r($tables);
//
echo '<br>';
$arr = explode(",",$files);
echo '<br>';
echo '<h3>'."Number of columns to import: ".sizeof($arr).'</h3>';
echo '<table border="1">';
echo '<tr>';
foreach ($arr as $td) {
  echo '<td>'.$td.'</td>';

}
echo '</tr>';
echo '</table>';


