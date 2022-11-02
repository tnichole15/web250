<?php require_once('../../private/initialize.php'); ?>

<?php
  
// Find all bicycles;
$bird = Bird::find_all();
  
?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


<link href="../stylesheets/staff.css" rel="stylesheet">

<div id="main">

  <div id="page">
    <div class="intro">
      <h1>Small Sampling of WNC Birds </h1>
    </div>

    <table id="inventory">
      <tr>
        <th>ID</th>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation Level</th>
        <th>Backyard</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>



  <?php foreach($bird as $bird) { ?>
        <tr>
          <td>
            <?php echo h($bird->id); ?>
          </td>

          <td>
            <?= h($bird->common_name); ?>
          </td>

          <td>
            <?= h($bird->habitat); ?>
          </td>

          <td>
            <?= h($bird->food); ?>
          </td>

          <td>
            <?= h($bird->conservationLevel()); ?>
          </td>

          <td>
            <?= h($bird->backyard_tips); ?>
          </td>
          <td><a class="action" href="<?php echo url_for('staff/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>

        </tr>
<?php } ?>

    </table>

    <div id="new">

      <a href="../staff/new.php" id="new-bird-button">Create New Bird</a>
    </div>
    <br>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
