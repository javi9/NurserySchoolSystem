
function sendMessage(){

	$.post('ajaxPost.php', $('#btn-input').val(), function(data){

		console.log(data);


	});
    



};
