<script>

    /*datwpicker*/
    jQuery('.mydatepicker').datetimepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd hh:ii",
        pickerPosition: 'bottom-right'
    });

    $(document).ready(function () {
        $(function () {
            $('.maskMoney').maskMoney({
                thousands: '.',
                decimal: ',',
                precision: 0
            });
        });

    });

    function toRp(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return 'Rp ' + rev2.split('').reverse().join('') + ',-';
    }

    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();


</script>