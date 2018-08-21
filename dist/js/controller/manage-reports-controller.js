$(document).ready(loadAllReports);

var selected = false

$("#btnsave").click(function () {

    console.log("clickedddd");

    if(selected==true){
        var ajaxReports={

            method : "POST",
            url : "api/Report.php",
            data:$("#ReportForm").serialize() + "&action=update",
            async : true
        }
        $.ajax(ajaxReports).done(function (response) {
            $("#tblReports tbody tr").remove();
            loadAllReports();
            $("#txtReportID").val("");
            $("#txtDoctorID").val("");
            $("#txtPatientID").val("");
            $("#txtDateofTest").val("");
            $("#txtDetails").val("");
            $("#txtReportID").focus();



    })



}else {
        var ajaxReport={

            method : "POST",
            url : "api/Report.php",
            data:$("#ReportForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxReport).done(function (response) {


            $("#tblReports tbody tr").remove();

            loadAllReports();
            $("#txtReportID").val("");
            $("#txtDoctorID").val("");
            $("#txtPatientID").val("");
            $("#txtDateofTest").val("");
            $("#txtDetails").val("");
            $("#txtReportID").focus();

        })

    }
    })

$("#btnAddnew").click(function () {

    selected= false
    $("txtReportID").val("");
    $("txtDoctorID").val("");
    $("txtPatientID").val("");
    $("txtDateofTest").val("");
    $("txtDetails").val("");
    $("txtReportID").focus();

})

function loadAllReports(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Report.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (reports){
            var html = "<tr>" +
                "<td>" + reports.reportid + "</td>" +
                "<td>" + reports.doctorid + "</td>" +
                "<td>" + reports.patientid + "</td>" +
                "<td>" + reports.date + "</td>" +
                "<td>" + reports.Details + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";

            $("#tblReports tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var ReportID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/Report.php?id=" + ReportID,
                        async: true
                    }).done(function(response){
                        if (response){
                            alert("Appointment has been successfully deleted");
                            $("#tblReports tbody tr").remove();
                            loadAllReports();
                        } else{
                            alert("Failed to delete the Report");
                        }
                    });

                }

            });
        });
        $("#tblReports tbody tr").off();
        $("#tblReports tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })

        $("#tblReports tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");
            $reportid = ($($(this).find("td").get(0)).text());
            $docid = ($($(this).find("td").get(1)).text());
            $patientid = ($($(this).find("td").get(2)).text());
            $dateoftest = ($($(this).find("td").get(3)).text());
            $details = ($($(this).find("td").get(4)).text());



            $("#txtReportID").val($reportid);
            $("#txtDoctorID").val($docid);
            $("#txtPatientID").val($patientid);
            $("#txtDateofTest").val($dateoftest);
            $("#txtDetails").val($details);


            console.log($reportid);
            selected = true;




        })






    });



    // $("#btnReport").click(function () {
    //     console.log("report button Clicked ");
    //
    //
    //             $("#txtReportID").val($reportid);
    //             $("#txtDoctorID").val($docid);
    //             $("#txtPatientID").val($patientid);
    //             $("#txtDateofTest").val($dateoftest);
    //             $("#txtDetails").val($details);
    //             $("#reporttxt").val("");
    //             $("#exampleFormControlTextarea1").val("");
    //            // var divContents = $("#dvContainer").html();
    //             var printWindow = window.open('', '', 'height=400,width=800');
    //             printWindow.document.write('<html><head><</style><title>Medical Report </title>');
    //             printWindow.document.write('</head><body >');
    //             printWindow.document.write(divContents);
    //             printWindow.document.write('</body></html>');
    //             printWindow.document.close();
    //             printWindow.print();
    //
    //
    //
    // });

}


