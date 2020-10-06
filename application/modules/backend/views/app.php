<?php $this->load->view('partials/head') ?>
<body>
<div class="wrapper">
    <div class="main-header">
        <div class="logo-header" data-background-color="blue2">
            <a href="<?= base_url() ?>" class="logo ml-md-4">
                <img src="<?= asset('vendor/theme/img/logo.svg') ?>" alt="..." class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        
        <?php $this->load->view('partials/nav')?>
    </div>

    <?php $this->load->view('partials/sidebar');?>

    <div class="main-panel">
        <?php include_part(isset($content) ? $content : ''); ?>
        <?php $this->load->view('partials/footer') ?>
    </div>

</div>
<?php $this->load->view('partials/scripts')?>
</body>
</html>