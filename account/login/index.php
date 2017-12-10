<?php include($_SERVER["DOCUMENT_ROOT"]."/head.php"); ?>
<?php if(!$loggedIn) { ?>
<h2>Anmelden</h2>
<?php
?>
<h3><?php echo $loginMessage; ?></h3>
<form action="?loginRequest=1" method="POST">
	<input type="hidden" name="login" value="1">
	<div class="form-group">
		<label for="username">Nutzername:</label>
		<input type="text" class="form-control" id="username" name="username" required="required" value="<?= $predefUsername; ?>">
	</div>
	<div class="form-group">
		<label for="password">Passwort:</label>
		<input type="password" class="form-control" id="password" name="password" required="required" value="<?= $predefPassword; ?>">
	</div>
	<div class="form-group">
		<label>Captcha:</label><br>
		<?php

		$options = array();
     	$options['input_name']             = 'captcha'; // change name of input element for form post
      	$options['disable_flash_fallback'] = false; // allow flash fallback

		echo Securimage::getCaptchaHtml($options);
		?>
	</div>
	<button type="submit" class="btn btn-default btn-primary">Anmelden</button>&nbsp;&nbsp;<a href="/account/register" class="btn btn-secondary">Registrieren</a>
</form>
<?php
} else {
	echo '<p class="error">Sie sind bereits angemeldet!</p>';
}
?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/footer.php"); ?>