<div class="formcontainer">
<h2>Upload File</h2>
<p>
Only csv and txt files will upload. These will be available for import from the uploads 
folder but need to be the correct format ie column number and content to work correctly. Some
data will insert into the database table without be the correct type.
</p>

<?php echo $message;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
</div>