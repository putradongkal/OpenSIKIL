<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>OpenSIKIL <?= isset($title) ? ' - ' . $title : '' ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= asset('vendor/theme/img/icon.png')?>" type="image/png"/>
	<script src="<?= asset('vendor/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= asset('vendor/theme/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="<?= asset('vendor/theme/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?= asset('vendor/theme/css/atlantis.min.css')?>">
    <link rel="stylesheet" href="<?= asset('vendor/theme/css/demo.css')?>">
    <?php include_part(isset($css) ? $css : ''); ?>
</head>