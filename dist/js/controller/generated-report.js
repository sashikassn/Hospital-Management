

$("#btnsearch").click(function () {
    console.log("BTTNCLICKEDDDDD");
    var $id = $("#txtReportID").val();





    var ajaxConfig = {

        method: "GET",
        url: "api/Report.php",
        data: {
            action: "findbyid",
            id: $id,

        },
        async: true


    }

    $.ajax(ajaxConfig).done(function (resonse) {
        if (resonse !=null){


            $("#txtReportID").val(resonse.reportid);
            $("#txtDoctorID").val(resonse.doctorid);
            $("#txtPatientID").val(resonse.	patientid);
            $("#txtDateofTest").val(resonse.date);
            $("#txtDetails").val(resonse.Details);

        }

    })
    });