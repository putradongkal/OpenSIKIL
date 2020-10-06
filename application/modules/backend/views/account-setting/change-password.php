<div class="container" style="padding: 0px !important; min-height: calc(100% - 123px); margin-top: 61px; overflow: hidden; overflow-x: hidden;overflow-y: hidden;width: 100%;max-width: unset">
    <div class="page-inner">
        <h4 class="page-title">Setting Akun</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                <li class="nav-item submenu"> <a class="nav-link" href="<?= my('account-setting') ?>">Profile</a> </li>
                                <li class="nav-item submenu"> <a class="nav-link active show" href="<?= my('account-setting/password') ?>">Password</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open('my/account-setting/password') ?>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password lama">
                                    <?= form_error('password', '<small class="messages text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="Password minimal 6 karakter">
                                    <?= form_error('new_password', '<small class="messages text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Ulangi password baru">
                                    <?= form_error('new_password_confirmation', '<small class="messages text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-3">
                            <button class="btn btn-success">Ubah Password</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>