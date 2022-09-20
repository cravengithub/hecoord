<?php
$this->load->view("header");
?>
    <h2><?= $title;?></h2>

    <div id="function_description"> 
	<?= $search_results;?>
	</div>

<?php
$this->load->view("footer");
?>