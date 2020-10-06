<div class="container" style="padding: 0px !important; min-height: calc(100% - 123px); margin-top: 61px; overflow: hidden; overflow-x: hidden;overflow-y: hidden;width: 100%;max-width: unset">
    <div class="page-inner">
        <h4 class="page-title">Setting Akun</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                <li class="nav-item submenu"> <a class="nav-link active show" href="<?= my('account-setting') ?>">Profil</a> </li>
                                <li class="nav-item submenu"> <a class="nav-link" href="<?= my('account-setting/password') ?>">Password</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('my/account-setting') ?>
                            <div class="row mt-3">
                                <div class="col-md-12 text-center">
                                    <label for="foto-profil">
                                        <img src="<?= userdata()->profile_picture == null ? asset('vendor/theme/img/user.svg') : uploads('images/profile-picture/' . userdata()->profile_picture) ?>" onerror="this.src='<?= asset('vendor/theme/img/user.svg') ?>" class="profile-picture-preview" id="profile-picture-preview" style="cursor:pointer; height:120px; width:120px; object-fit:cover; border-radius:50%"/>
                                    </label>
                                    <br>

                                    <?php if(userdata()->profile_picture != null): ?>
                                        <label style="font-size: 12px!important" class="mt-2"><a href="javascript:void(0)" onclick="document.getElementById('delete-profile-picture').value=1; document.getElementById('profile-picture-preview').setAttribute('src', '<?= asset('vendor/theme/img/user.svg') ?>')">Hapus foto</a></label>
                                        <input type="hidden" class="form-control" id="delete-profile-picture" name="delete_profile_picture">
                                    <?php endif ?>
                                    <input type="file" name="profile_picture" id="foto-profil" class="d-none" accept=".jpg,.jpeg,.png,.gif,.svg"/>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group form-group-default">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?= userdata()->name ?>">
                                        <?= form_error('name', '<small class="messages text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= userdata()->username ?>">
                                        <?= form_error('username', '<small class="messages text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= userdata()->email ?>">
                                        <?= form_error('email', '<small class="messages text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Nomor Handphone</label>
                                        <input type="text" class="form-control phone-number" name="phone_number" placeholder="Nomor Handphone" value="<?= userdata()->phone_number ?>">
                                        <?= form_error('phone_number', '<small class="messages text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button class="btn btn-success">Simpan</button>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>