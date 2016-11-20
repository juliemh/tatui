<?php
//
// This form is used to select a file to import and a table to import to
//
$this->load->helper(array('form', 'url'));

//
echo form_open('import/process_file');
echo '<h2>'.$message.'</h2>';
echo '<br>';

//
// List Tables
//
echo '<h3>Select Database Table</h3>';
echo form_dropdown('tablename', $tables, 'default');
//
// Dropdown for fly list
//
echo '<h3>Select file to import</h3>';
echo form_dropdown('filename', $files, '');
//
// submit selected data
//
echo '<br>';
echo '<h3>Commit to database</h3>';
echo form_submit('submit', 'Import Data!');

?>
