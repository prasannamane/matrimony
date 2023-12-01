$(document).ready(function() {

    /** Get Cast as per Religion  */
    $('.religion').change(function() {
        var religion = $(this).val();

        var settings = {
            "url": "/matrimony/api/get-cast-by-religion",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
            },
            "data": JSON.stringify({
                "religion_id": religion
            }),
        };

        $.ajax(settings).done(function(response) {

            response = response.data;
            var dynamicDropdown = $('.cast');
            dynamicDropdown.empty();
            response.forEach(function(option) {
                dynamicDropdown.append('<option value="' + option.id + '">' + option
                    .name + '</option>');
            });
        });
    });

    /** Get districts as per State  */
    $('.state').change(function() {
        var state = $(this).val();

        var settings = {
            "url": "/matrimony/api/get-districts-by-state",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
            },
            "data": JSON.stringify({
                "state_id": state
            }),
        };

        $.ajax(settings).done(function(response) {
            response = response.data;
            var dynamicDropdown = $('.districts');
            dynamicDropdown.empty();
            response.forEach(function(option) {
                dynamicDropdown.append('<option value="' + option.id + '">' + option
                    .name + '</option>');
            });
        });
    });


});