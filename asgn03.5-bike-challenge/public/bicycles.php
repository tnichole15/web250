<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
      </tr>

<?php 
  $parser = new ParseCSV(PRIVATE_PATH . '/used_bicycles.csv');
  $arrBicycles = $parser->parse();
?>
<?php foreach($arrBicycles as $arguments) { ?>
<?php $bike = new Bicycle($arguments); ?>

      <tr>
        <td>
          <?= h($bike->brand); ?>
        </td>
        <td>
          <?= h($bike->model); ?>
        </td>
        <td>
          <?= h($bike->year); ?>
        </td>
        <td>
          <?= h($bike->category); ?>
        </td>
        <td>
          <?= h($bike->gender); ?>
        </td>
        <td>
          <?= h($bike->color); ?>
        </td>
        <td>
          <?= h($bike->weightKg()) . '/' . h($bike->weightLBS()) ; ?>
        </td>
        <td>
          <?= h($bike->condition()); ?>
        </td>
        <td>
          <?php echo h(sprintf('%01.2f', $bike->price)); ?>
        </td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
