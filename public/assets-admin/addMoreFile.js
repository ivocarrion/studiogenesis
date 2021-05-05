$(document).on('click','#addMore',function(){

$('.table').show();

var task_name = $("#task_name").val();
var cost = $("#cost").val();
var source = $("#document-template").html();
var template = Handlebars.compile(source);

var data = {
   task_name: task_name,
   cost: cost
}

var html = template(data);
$("#addRow").append(html)

});

$(document).on('click','.removeaddmore',function(event){
$(this).closest('.delete_add_more_item').remove();
});
