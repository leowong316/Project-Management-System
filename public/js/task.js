$(document).ready(function () {
    $(".addTaskBtn").click(function () {
        $("#task_list").append("<div class='form-group'><label for='start_date' class='control-label col-sm-2'>Title</label><div class='col-sm-8'><input class='form-control' type='text' name='title[]'></div></div><div class='form-group'><label for='start_date' class='control-label col-sm-2'>Description</label><div class='col-sm-8'><input class='form-control' type='text' name='description[]'></div></div>");
    });
});