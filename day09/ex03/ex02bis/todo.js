$(document).ready(function(){
	var cookies = document.cookie.split(';');
	var list = null;
	$.each(cookies, function(i, cookie){
		if (/^\s*list=/.test(cookie))
			list = cookie.replace(/^\s*list=/, '');
	});
	$("#ft_list").html(list);
	$(".list_entry").click(remove_item);
1

	$("#new").click(function(){
		let text = prompt('What would you like TO DO?');
		if (text != null && text != "")
		{
			let item = $("<div class='list_entry'>"+text+"</div>");
			item.click(remove_item);
			$('#ft_list').prepend(item);
			update_cookie();
		}
	});

});

function remove_item(e){
	let check = confirm("Are you sure you want to delete "+$(e.target).text()+"?")
	if(check)
	{
		$(e.target).remove();
		update_cookie();
	}
}

function update_cookie(){
	theList = $("#ft_list").html();
	date = new Date(Date.now() + 60 * 60 * 1000);
	document.cookie = "list="+theList+";expires="+date.toGMTString();
}