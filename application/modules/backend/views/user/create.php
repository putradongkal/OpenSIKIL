<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pengguna</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?= my('home') ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= my('user') ?>">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Buat Baru</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Form Tambah Pengguna</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open(my('user/create')) ?>
                            <?php $this->load->view('user/field') ?>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>