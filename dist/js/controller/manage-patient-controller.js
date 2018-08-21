$(document).ready(loadAllPatients);

var selected = false;

$("#btnsavepatient").click(function () {
console.log("clicked");

    if (selected == true) {
        var tblPatients={

            method: "POST",
            url: "api/Patient.php",
            data: $("#patientForm").serialize() + "&action=update",
            async: true
        }


        $.ajax(tblPatients).done(function (response) {
            $("#tblPatients tbody tr").remove();
            loadAllPatients();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtGender").val("");
            $("#txtAddress").val("");
            $("#txtAge").val("");
            $("#txtId").focus();

        })
    } else {

        var ajaxPatient = {
            method: "POST",
            url: "api/Patient.php",
            data: $("#patientForm").serialize() + "&action=save",
            async: true
        }

        $.ajax(ajaxPatient).done(function (response) {
            $("#tblPatients tbody tr").remove();
            loadAllPatients();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtGender").val("");
            $("#txtAddress").val("");
            $("#txtAge").val("");
            $("#txtId").focus();
        })


    }
})

$("#btnAddnew").click(function () {
    selected = false;

    $("txtId").val("");
    $("txtName").val("");
    $("txtGender").val("");
    $("txtAddress").val("");
    $("txtAge").val("");
    $("txtId").focus();


})

function loadAllPatients() {

    var ajaxConfig = {
        method: "GET",
        url: "api/Patient.php?action=all",
        async: true

    };
    console.log(ajaxConfig);

    $.ajax(ajaxConfig).done(function (response) {
        console.log(response);
        response.forEach(function(patient){
            var html = "<tr>" +
                "<td>" + patient.id + "</td>" +
                "<td>" + patient.name + "</td>" +
                "<td>" + patient.gender + "</td>" +
                "<td>" + patient.address + "</td>" +
                "<td>" + patient.age + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-sign-out"></i></td>' +
                "</tr>";

            $("#tblPatients tbody").append(html);

            $(".recycle").off();
            $(".recycle").click(function () {
                console.log("click unaaa bro");

                var patientID = ($(this).parents("tr").find("td:first-child").text());
                console.log(patientID);


                if (confirm("Are you sure that you want to delete?")) {

                    $.ajax({
                        method: "DELETE",
                        url: "api/Patient.php?id=" + patientID,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            console.log(response);
                            alert("Patient has been successfully deleted");
                            $("#tblPatients tbody tr").remove();
                            loadAllPatients();
                        } else {
                            alert("Failed to delete the Patient");
                        }
                    });

                }

            });


        });
        $("#tblPatients tbody tr").off();
        $("#tblPatients tbody tr").mouseenter(function () {
            $("tr").css("cursor","pointer")

        })



        $("#tblPatients tbody tr").click(function (eventData) {
            console.log("row Clicked");

            console.log(eventData);


            $patientid = ($($(this).find("td").get(0)).text());
            $name = ($($(this).find("td").get(1)).text());
            $gender = ($($(this).find("td").get(2)).text());
            $address = ($($(this).find("td").get(3)).text());
            $age = ($($(this).find("td").get(4)).text());


            $("#txtId").val($patientid);
            $("#txtName").val($name);
            $("#txtGender").val($gender);
            $("#txtAddress").val($address);
            $("#txtAge").val($age);


            selected= true;


        })

    });

}

