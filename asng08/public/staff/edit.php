<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/index.php'));
}

$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false){
  redirect_to((url_for('/staff/bicycles/index.php')));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['bird'];

  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/staff/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display form
  
    $bird = Bird::find_by_id($id);
    if($bird == false) {
      redirect_to(url_for('/staff/index.php'));
    }
  
}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <?php 
      echo display_errors($bird->errors);
    ?>

    <form action="<?php echo url_for('/staff/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Edit Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
