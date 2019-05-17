
function check_cookie(){
    var cookies = document.cookie.split(';');
    var list = null;
    cookies.forEach(function(cookie){
        if (/^\s*list=/.test(cookie))
            list = cookie.replace(/^\s*list=/, '');
    });
    document.getElementById("ft_list").innerHTML = list;
    items = document.getElementsByClassName('list_entry');
    let i = 0;
    while (items.item(i))
    {
        items.item(i).onclick = remove_item;
        i++;
    }
}

function make_new(){

    let text = prompt('What would you like TO DO?');
    if (text != null && text != "")
    {
        let item = document.createElement('div');
        item.className = 'list_entry';
        item.innerText = text;
        item.onclick = remove_item;
        document.getElementById('ft_list').prepend(item);
        update_cookie();
    }
}

function remove_item(e){
    let check = confirm("Are you sure you want to delete "+e.target.innerText+"?")
    if(check)
    {
        e.target.remove();
        update_cookie();
    }
}

function update_cookie(){
    theList = document.getElementById("ft_list").innerHTML;
    date = new Date(Date.now() + 60 * 60 * 1000);
    document.cookie = "list="+theList+";expires="+date.toGMTString();
}
