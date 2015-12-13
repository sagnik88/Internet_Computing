$.ajax( "api1.php" ).done(function (response) {
    var data = [{"id":"1732","name":"1BR House","checkin":"2012-12-20","checkout":"2012-12-23","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1587","name":"1BR House","checkin":"2012-12-23","checkout":"2013-01-01","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1661","name":"2BR Studio","checkin":"2012-12-25","checkout":"2013-01-02","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1829","name":"Studio Cottage","checkin":"2012-12-25","checkout":"2012-12-29","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1787","name":"Studio Cottage","checkin":"2012-12-29","checkout":"2013-01-08","inclean_cleaner":"","inclean_datetime":"2012-12-29 00:00:00","inclean_notes":""},{"id":"1843","name":"1BR House","checkin":"2013-01-07","checkout":"2013-01-19","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1970","name":"Studio Cottage","checkin":"2013-01-12","checkout":"2013-01-19","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""},{"id":"1942","name":"Suite","checkin":"2013-01-15","checkout":"2013-01-20","inclean_cleaner":"","inclean_datetime":"0000-00-00 00:00:00","inclean_notes":""}];
    var data = $.parseJSON(response);
    var dashboard_list_unitname = 'change_this';
    var booking_id = 'also_change_this';

    $(data).each(function (i, row) {
            $(row).each(function (j, col) {
                    var html = '<div class="row_' + i + '">' +
                            '<div class="' + dashboard_list_unitname + '">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.name + '</a></div>' +
                            '<div class="dashboard_list_cleaner_datetime">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.inclean_datetime + '</a></div>' +
                            '<div class="dashboard_list_cleaner_checkin">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.checkin + '</a></div>' +
                            '<div class="dashboard_list_cleaner_checkout">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.checkout + '</a></div>' +
                            '<div class="dashboard_list_cleaner_inclean_cleaner">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.inclean_cleaner + '</a></div>' +
                            '<div class="dashboard_list_cleaner_notes">&nbsp;<a href="add-edit.php?bookingID=' + booking_id + '">' + col.inclean_notes + '</a></div>' +
                            '</div>';
                    $('body').append($(html));
            });
    });
});