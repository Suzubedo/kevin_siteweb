<?php
	include '../hautDePage.php';
	include '../config.php';
	require_once "../JBBCode/Parser.php";

	$req = $bdd->query('SELECT * FROM cgu');
	$cgu = $req->fetch();

	$parser = new JBBCode\Parser();
	$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
	$parser->addBBCode("center", '<div align="center">{param}</div>');
	$parser->addBBCode("left", '<div align="left">{param}</div>');
	$parser->addBBCode("right", '<div align="right">{param}</div>');	
	?>

	<div class="cgu"> <!-- a modifier avec css-->
		<?php
			$text = $cgu['cguContent'];
			$parser->parse($text);
			echo $parser->getAsHtml();
		?>
	</div>

<?php include '../basDePage.php'; ?>