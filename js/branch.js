$(document).ready(function () {
    
    $("#course").change(function () {

        $("#branch_dt_select2").hide();

        if ($('#course').val() == "") {

            $("#branch_dt_select2").hide();

        } else if ($('#course').val() == "B.Tech") {

            $("#branch_dt_select1").prop('disabled', this.value != "B.Tech").show();
            $("#branch_dt_select2").hide();

        } else {

            $("#branch_dt_select2").prop('disabled', this.value != "BBA").show();
            $("#branch_dt_select1").hide();

        }

    }).change();

});