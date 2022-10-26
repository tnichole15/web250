<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <h1>Small Sampling of WNC Birds </h1>
    </div>

    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation Level</th>
        <th>Backyard</th>
      </tr>

<?php 
  $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
  $arrBirds = $parser->parse();
?>

<?php foreach($arrBirds as $arguments) { ?>

  <?php $bird = new Bird($arguments); ?>

        <tr>
          <td>
            <?= h($bird->commonName); ?>
          </td>
          <td>
            <?= h($bird->habitat); ?>
          </td>
          <td>
            <?= h($bird->food); ?>
          </td>
          <td>
            <?= h($bird->nestPlace); ?>
          </td>
          <td>
            <?= h($bird->behavior); ?>
          </td>
          <td>
            <?= h($bird->conservationLevel()); ?>
          </td>
          <td>
            <?= h($bird->backyard); ?>
          </td>

        </tr>
<?php } ?>

    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
