
<?php require_once('../../private/initialize.php'); ?>
<?php require_once('../../private/functions.php'); ?>

<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('../staff/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo $bird->common_name; ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo $bird->habitat; ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo $bird->food; ?>" /></dd>
</dl>

<dl>
  <dt>Conservation Level (1-5)</dt>
  <dd><input type="text" name="bird[conservation_id]" value="<?php echo $bird->conservation_id; ?>" /></dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><input type="text" name="bird[backyard_tips]" value="<?php echo $bird->backyard_tips; ?>" /></dd>
</dl>


