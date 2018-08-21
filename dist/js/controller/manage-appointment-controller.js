$(document).ready(loadAllAppointments);

var selected = false

$("#btnsave").click(function () {

    console.log("buton click working");
    if(selected==true){
        var ajaxAppointment={

            method : "POST",
            url : "api/Appointment.php",
            data:$("#AppoForm").serialize() + "&action=update",
            async : true

        }

        $.ajax(ajaxAppointment).done(function (response) {
            $("#tblAppointments tbody tr").remove();
            loadAllAppointments();
            $("#txtappoid").val("");
            $("#txtdocid").val("");
            $("#txtpatientid").val("");
            $("#txtDate").val("");
            $("#txtappoid").focus();


        })
    }else{

        var ajaxAppointmnet={

            method : "POST",
            url : "api/Appointment.php",
            data:$("#AppoForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxAppointmnet).done(function (response) {


            $("#tblAppointments tbody tr").remove();
            loadAllAppointments();
            $("#txtappoid").val("");
            $("#txtdocid").val("");
            $("#txtpatientid").val("");
            $("#txtDate").val("");
            $("#txtappoid").focus();

        })
    }





})

$("#btnAddnew").click(function () {
    selected =  false
    $("#txtappoid").val("");
    $("#txtdocid").val("");
    $("#txtpatientid").val("");
    $("#txtDate").val("");
    $("#txtappoid").focus();
})


function loadAllAppointments(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Appointment.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (appointment){
            var html = "<tr>" +
                "<td>" + appointment.appoid + "</td>" +
                "<td>" + appointment.docid + "</td>" +
                "<td>" + appointment.patientid + "</td>" +
                "<td>" + appointment.date + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";

            $("#tblAppointments tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var AppointmentID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/Appointment.php?id=" + AppointmentID,
                        async: true
                    }).done(function(response){
                        if (response){
                            alert("Appointment has been successfully deleted");
                            $("#tblAppointments tbody tr").remove();
                            loadAllAppointments();
                        } else{
                            alert("Failed to delete the Appointment");
                        }
                    });

                }

            });
        });
        $("#tblAppointments tbody tr").off();
        $("#tblAppointments tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })
        // $("# tbody  tr").click(function (eventData) {
        //     console.log("raw eka click kraa");
        //
        //     $id = ($($(this).find("td").get(0)).text());
        //     $name = ($($(this).find("td").get(1)).text());
        //     $address = ($($(this).find("td").get(2)).text());
        //
        //     $("#txtId").val($id);
        //     $("#txtName").val($name);
        //     $("#txtAddress").val($address);

        $("#tblAppointments tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");
            $appoid = ($($(this).find("td").get(0)).text());
            $docid = ($($(this).find("td").get(1)).text());
            $patientid = ($($(this).find("td").get(2)).text());
            $date = ($($(this).find("td").get(3)).text());

            $("#txtappoid").val($appoid);
            $("#txtdocid").val($docid);
            $("#txtpatientid").val($patientid);
            $("#txtDate").val($date);

            console.log($appoid);
            selected = true;




        })






    });



}
//
// $(document).on("click","# tbody tr",function () {
//
//     selected = true;
//     $("#txtId").val($(this).find("td:nth-child(1)").text());
//
//     $("#txtName").val($(this).find("td:nth-child(2)").text());
//     $("#txtAddress").val($(this).find("td:nth-child(3)").text());
//
//
// });