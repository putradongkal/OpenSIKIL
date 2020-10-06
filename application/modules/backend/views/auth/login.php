<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Masuk OpenSikil</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= asset('vendor/theme/img/icon.ico')?>" type="image/x-icon"/>

    <script src="<?= asset('vendor/webfont/webfont.min.js')?>"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= asset('vendor/theme/css/fonts.min.css') ?>']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="<?= asset('vendor/theme/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= asset('vendor/theme/css/atlantis.css')?>">
</head>
<body class="login">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">OpenSIKIL</h3>
        <?= isset($failed) && !empty($failed) ? "<p class='text-danger'>{$failed}</p>" : ""; ?>
        <?= form_open(base_url('login'), 'class="login-form"') ?>
            <div class="form-group form-floating-label">
                <input id="username" name="username" type="text" class="form-control input-border-bottom" required>
                <label for="username" class="placeholder">Username</label>
            </div>
            <div class="form-group form-floating-label">
                <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
                <label for="password" class="placeholder">Password</label>
                <div class="show-password">
                    <i class="icon-eye"></i>
                </div>
            </div>
            <div class="row form-sub m-0">
            </div>
            <div class="form-action mb-3">
                <button type="submit" class="btn btn-primary btn-rounded btn-login">Masuk</button>
            </div>
        <?= form_close() ?>
    </div>

</div>
<script src="<?= asset('vendor/theme/js/core/jquery.3.2.1.min.js')?>"></script>
<script src="<?= asset('vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
<script src="<?= asset('vendor/theme/js/core/popper.min.js')?>"></script>
<script src="<?= asset('vendor/theme/js/core/bootstrap.min.js')?>"></script>
<script src="<?= asset('vendor/theme/js/atlantis.min.js')?>"></script>
</body>
</html>