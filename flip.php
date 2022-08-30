<style>
	.coin {
    background-color: #c0c0c0;
    border: 5px solid #a7a5a5;
		border-radius: 50%;
		color: #333333;
    display: flex;
		font-size: 2rem;
    font-family: 'Courier New', Courier, monospace;
		font-weight: Bold;
    justify-content: center;
		padding: 70px;
		width: 50px;
	}
</style>

<?php

  function flip() {
    // Challenge: define this function

    $result = rand(0, 1);

    if ($result == 0) {
      return 'Heads';
    }
    else {
      return 'Tails';
    };

  };

?>

<div class="coin">
	<?php 

    echo flip(); 
  
  ?>
</div>
