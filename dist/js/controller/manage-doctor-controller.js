$(document).ready(loadAllDoctors);

var selected = false

$("#btnsavedoc").click(function () {

console.log("buton click working");
    if(selected==true){
        var ajaxDoctor={

            method : "POST",
            url : "api/Doctor.php",
            data:$("#DoctorForm").serialize() + "&action=update",
            async : true

        }

        $.ajax(ajaxDoctor).done(function (response) {
            $("#tblDoctors tbody tr").remove();
            loadAllDoctors();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtAddress").val("");
            $("#txtSpecial").val("");
            $("#txtId").focus();


        })
    }else{

        var ajaxDoctor={

            method : "POST",
            url : "api/Doctor.php",
            data:$("#DoctorForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxDoctor).done(function (response) {


            $("#tblDoctors tbody tr").remove();
            loadAllDoctors();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtAddress").val("");
            $("#txtSpecial").val("");
            $("#txtId").focus();


            if(response) {
                alert("Doctor Has been Added Successfully");


            }else {
                alert("Failed to save the Doctor")
            }

        })
    }





})

$("#btnAddnewDoc").click(function () {
    selected =  false;
    $("#txtId").val("");
    $("#txtName").val("");
    $("#txtAddress").val("");
    $("#txtSpecial").val("");
    $("#txtId").focus();
})


function loadAllDoctors(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Doctor.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        console.log(response);
        response.forEach(function (doctor){
            var html = "<tr>" +
                "<td>" + doctor.docid + "</td>" +
                "<td>" + doctor.docname + "</td>" +
                "<td>" + doctor.address + "</td>" +
                "<td>" + doctor.Specialized_in + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";

            $("#tblDoctors tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var DoctorID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){


                    $.ajax({
                        method:"DELETE",
                        url:"api/Doctor.php?id=" + DoctorID,
                        async: true
                    }).done(function(response){
                       if (response){
                           console.log(response);
                           alert("Doctor has been successfully deleted");
                           $("#tblDoctors tbody tr").remove();
                           loadAllDoctors();
                       } else{
                           alert("Failed to delete the Doctor");
                       }
                    });

                }

            });
       });
        $("#tblDoctors tbody tr").off();
        $("#tblDoctors tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })
        // $("#tblDoctors tbody  tr").click(function (eventData) {
        //     console.log("raw eka click kraa");
        //
        //     $id = ($($(this).find("td").get(0)).text());
        //     $name = ($($(this).find("td").get(1)).text());
        //     $address = ($($(this).find("td").get(2)).text());
        //
        //     $("#txtId").val($id);
        //     $("#txtName").val($name);
        //     $("#txtAddress").val($address);

        $("#tblDoctors tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");
            $id = ($($(this).find("td").get(0)).text());
            $name = ($($(this).find("td").get(1)).text());
            $address = ($($(this).find("td").get(2)).text());
            $special = ($($(this).find("td").get(3)).text());

            $("#txtId").val($id);
            $("#txtName").val($name);
            $("#txtAddress").val($address);
            $("#txtSpecial").val($special);

    console.log($id);
            selected = true;




        })






    });



}
//
// $(document).on("click","#tblDoctors tbody tr",function () {
//
//     selected = true;
//     $("#txtId").val($(this).find("td:nth-child(1)").text());
//
//     $("#txtName").val($(this).find("td:nth-child(2)").text());
//     $("#txtAddress").val($(this).find("td:nth-child(3)").text());
//
//
// });