$(function(){
	$('.category').children('span').click(function(){
		$(this).siblings('ul').toggle();
	});
});

/*
function paper(id){
    $.ajax({
        type: "POST",
        data:"id="+id,
        url: "paper",
        async: true,
        dataType: "json",
        success:function(data){
            var xz = data.xz;
            var tk = data.tk;
            var wd = data.wd;
            var center = $('.center');
        }
    });
}
*/
