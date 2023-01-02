$(document).ready(function() {

        var now = new Date();
        var yearFrom = now.getFullYear() - 100;
        var yearTo = now.getFullYear();

        $(function() {
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd-mm-yy',
                firstDay: 1,
                yearRange: yearFrom + ':' + yearTo,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

        });

        $(function() {
            $("#dateOfBirth").datepicker();
        })

        $(function() {

            var year = $('#dateOfBirth');
            var clase = $('#class');
            year.change(function() {
                clase.val(year.val().slice(6, 10));
            });
        })
    }) //fin del document.ready 
 