<script src="<?= asset('vendor/cleave.js/cleave.min.js') ?>"></script>
<script src="<?= asset('vendor/cleave.js/addons/cleave-phone.id.js') ?>"></script>
<script> 
    $(function () { 
        if($('#phone-number').length) { $('#phone-number').toArray().forEach(function(field){ new Cleave(field, { phone: true, phoneRegionCode: 'id', numericOnly: true, delimiter: ''});}); }
        if($('#username').length) { var cleave = new Cleave('#username', { blocks: [100], uppercase: false }); }
    });
</script>