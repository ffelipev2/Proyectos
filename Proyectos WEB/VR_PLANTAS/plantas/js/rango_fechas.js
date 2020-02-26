            $(function () {
                $("#from").datepicker({
                    dateFormat: 'dd-mm-y',
                    changeYear: true,
                    onClose: function (selectedDate) {
                        $("#to").datepicker("option", "minDate", selectedDate);
                    }
                });
                $("#to").datepicker({
                    dateFormat: 'dd-mm-y',
                    changeYear: true,
                    onClose: function (selectedDate) {
                        $("#from").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });