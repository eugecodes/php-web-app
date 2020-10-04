<?php foreach($ciudades as $c){ ?>
	<li onclick="oculta('<?php echo $c->ciudad; ?>');"><?php echo $c->ciudad; ?></li>
<?php } ?>
