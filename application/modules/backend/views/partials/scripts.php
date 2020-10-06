<script src="<?= asset('vendor/theme/js/core/jquery.3.2.1.min.js')?>"></script>
<script src="<?= asset('vendor/theme/js/core/popper.min.js')?>"></script>
<script src="<?= asset('vendor/theme/js/core/bootstrap.min.js')?>"></script>

<!-- jQuery UI -->
<script src="<?= asset('vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
<script src="<?= asset('vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?= asset('vendor/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>

<!-- Bootstrap Notify -->
<script src="<?= asset('vendor/bootstrap-notify/bootstrap-notify.min.js')?>"></script>

<!-- Sweet Alert -->
<script src="<?= asset('vendor/sweetalert/sweetalert.js')?>"></script>

<!-- Atlantis JS -->
<script src="<?= asset('vendor/theme/js/atlantis.min.js')?>"></script>

<script src="<?= asset('js/script.js')?>"></script>
<script src="<?= asset('vendor/sweetalert/sweetalert.js')?>"></script>
<script src="<?= asset('vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<?php include_part(isset($script) ? $script : ''); ?>

<?php
if ($this->session->flashdata('message')) {
    ?>
    <script>
        $(function(){
            $.notify({
                icon: 'fa fa-check',
                title: 'Berhasil',
                message: '<?= $this->session->flashdata('message') ?>',
            }, {
                type: 'success',
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 2000,
            });
        });
    </script>
    <?php
}
?>

<?php
if ($this->session->flashdata('error_message')) {
    ?>
    <script>
        $(function(){
            $.notify({
                icon: 'fa fa-times',
                title: 'Terjadi Kesalahan',
                message: '<?= $this->session->flashdata('error_message') ?>',
            }, {
                type: 'danger',
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 2000,
            });
        });
    </script>
    <?php
}
?>