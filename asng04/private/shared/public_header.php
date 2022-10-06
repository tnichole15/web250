<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/images/tufted-titmouse.jpg'); ?>">

          <img class="bike-icon" 
            src="<?php echo url_for('/images/tufted-titmouse.jpg') ?>"
          ><br>
          WNC Birds
        </a>

      </h1>
    </header>
