$(document).ready(function () {
    $(".addTaskBtn").click(function () {
        $("#task_list").append(
            "<div class='form-group'>"+
                "<label for='taskname' class='control-label col-sm-2'>"+
                    "Title"+
                "</label>"+
                "<div class='col-sm-8'>"+
                    "<input class='form-control' type='text' name='taskname[]'>"+
                "</div>"+
            "</div>"+

            "<div class='form-group'>"+
            "<label for='taskdescription' class='control-label col-sm-2'>"+
                "Description"+
            "</label><div class='col-sm-8'>"+
                "<input class='form-control' type='text' name='taskdescription[]'>"+
            "</div>");
    });
});