<script src="<?= asset('vendor/cleave.js/cleave.min.js') ?>"></script>
<script src="<?= asset('vendor/cleave.js/addons/cleave-phone.id.js') ?>"></script>
<script>
    $(function(){
        new Cleave('.phone-number', { phone: true, phoneRegionCode: 'id', numericOnly: true, delimiter: ''});
    
        $('#foto-profil').on('change', function(){
            readURL(this);
        });

    });

    function readURL(input) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-picture-preview').attr('src', e.target.result);
                document.getElementById('delete-profile-picture').value=0;
            }

            reader.readAsDataURL(input.files[0]);
        }

        else if(!url)
        {
            $('.profile-picture-preview').attr('src', '<?= asset('vendor/theme/img/user.svg') ?>');
        }

        else {
            swal({
                title: "Kesalahan upload",
                text: "Jenis file tidak didukung!",
                icon: "error",
                dangerMode: true,
            });
            $('.profile-picture-preview').attr('src', '<?= asset('vendor/theme/img/user.svg') ?>');
        }
    }
</script>