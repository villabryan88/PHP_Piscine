

function make_new(){

    let text = prompt('What would you like TO DO?');
    if (text != null && text != "")
    {
        let item = document.createElement('div');
        item.className = 'list_entry';
        item.innerText = text;
        item.onclick = remove_item;
        document.cookie = "username=JohnDoe";
        console.log(document.cookie);
        document.getElementById('ft_list').prepend(item);
    }
}

function remove_item(e){
    e.target.remove();
}

function update_cookie(){
    document.cookie = "username=John Doe";
}
