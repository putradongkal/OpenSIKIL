<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
	<div class="container-fluid">
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="<?= userdata()->profile_picture == null ? asset('vendor/theme/img/user.svg') : uploads('images/profile-picture/' . userdata()->profile_picture) ?>" onerror="this.src='<?= asset('vendor/theme/img/user.svg') ?>" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="u-text">
									<h4><?= userdata()->name?></h4>
									<p class="text-muted"><?= userdata()->email?></p><a href="#" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<?= form_open(base_url('logout'), 'id="logout"') ?>
								<input type="hidden" name="request" value="true">
							<?= form_close() ?>
							<a class="dropdown-item" href="<?= base_url('profile') ?>">Profil Saya</a>
							<a class="dropdown-item" href="<?= base_url('account-setting') ?>">Pengaturan Akun</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">Logout</a>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>