<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= userdata()->profile_picture == null ? asset('vendor/theme/img/user.svg') : uploads('images/profile-picture/' . userdata()->profile_picture) ?>" onerror="this.src='<?= asset('vendor/theme/img/user.svg') ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= userdata()->name?>
									<span class="user-level"><?= role($this->auth->roles()[0])->display_name ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?= base_url('profile') ?>">
											<span class="link-collapse">Profil Saya</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('account-setting') ?>">
											<span class="link-collapse">Pengaturan Akun</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?= $this->uri->segment(2) == 'home' ? 'active' : '' ?>">
							<a href="<?= base_url('home') ?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu Utama</h4>
						</li>
					</ul>
				</div>
			</div>
		</div>