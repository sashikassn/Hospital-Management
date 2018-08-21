$(document).ready(function(){

    var ajaxConfig = {
        method:"GET",
        url:"api/Doctor.php",
        data:{
            action:"count"
        },
        async:true
    }

    $.ajax(ajaxConfig).done(function(response){
        $("#lblDoctorsCount").text(response);
    });

    // $('#lblDoctorsCount').each(function () {
    //     $(this).prop('Counter',0).animate({
    //         Counter: $(this).text()
    //     }, {
    //         duration: 4000,
    //         easing: 'swing',
    //         step: function (now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //     });
    // });




    var ajaxconfig2 = {
        method: "GET",
        url:"api/Patient.php",
        data:{
            action:"count"
        },
        async:true
    }
    $.ajax(ajaxconfig2).done(function (response) {
        $("#lblPatientsCount").text(response);


    });
    var ajaxConfig3 = {

        method: "GET",
        url:"api/Appointment.php",
        data:{
            action:"count"
        },
        async:true

    }
    $.ajax(ajaxConfig3).done(function (response) {
        $("#lblAppointmetsCount").text(response);

    });

    var ajaxConfig4 = {

        method: "GET",
        url:"api/Report.php",
        data:{
            action:"count"
        },
        async:true
    }
    $.ajax(ajaxConfig4).done(function (response) {
        $("#lblReportCount").text(response);

    });


});


