<div class="container" style="padding: 0px !important; min-height: calc(100% - 123px); margin-top: 61px; overflow: hidden; overflow-x: hidden;overflow-y: hidden;width: 100%;max-width: unset">
    <div class="page-inner">
        <h4 class="page-title">User Profile</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                <li class="nav-item submenu"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profile</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <small style="font-size: 12px">Nama</small>
                                    <label class="mt-2"><?= userdata()->name ?></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <small style="font-size: 12px">Username</small>
                                    <label class="mt-2"><?= userdata()->username ?></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <small style="font-size: 12px">Email</small>
                                    <label class="mt-2"><?= userdata()->email == '' ? '-' : userdata()->phone_number ?></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <small style="font-size: 12px">Nomor Handphone</small>
                                    <label class="mt-2"><?= userdata()->phone_number == '' ? '-' : userdata()->phone_number ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="<?= userdata()->profile_picture == null ? asset('vendor/theme/img/user.svg') : uploads('images/profile-picture/' . userdata()->profile_picture) ?>" onerror="this.src='<?= asset('vendor/theme/img/user.svg') ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name"><?= userdata()->name ?></div>
                            <div class="job">@<?= userdata()->username ?></div>
                            <div class="desc"><?= role($this->auth->roles()[0])->display_name ?></div>
                            <div class="view-profile">
                                <a href="<?= my('account-setting') ?> " class="btn btn-secondary btn-block">Setting Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>