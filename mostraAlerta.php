<?php
session_start();
 function mostraAlerta($tipo) {
     if(isset($_SESSION[$tipo])) {
?>
	<div class="alert alert-<?=$tipo?> .alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4><?= $_SESSION[$tipo]?></h4>
	</div>
    <!--<h4 class="alert-<?= $tipo ?>"><</h4>-->
<?php
        unset($_SESSION[$tipo]);
     }
 }?>