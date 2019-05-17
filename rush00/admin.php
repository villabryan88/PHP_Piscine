<?php
session_start();
include('navbar.php');
include('admin_items.php');
include "dbfunc/delete.php";

$accounts = unserialize(file_get_contents("privdb/users"));

if (!(isset($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"] && check_admin($accounts, $_SESSION["logged_on_user"])))
{
    header("Location: store.php");
    die();
}


if (isset($_POST["edit_user_login"]))
{
    if ($_POST["edit_user"] == "delete")
    {
        delete_user($_POST["edit_user_login"]);
    }
    if ($_POST["edit_user"] == "make admin")
    {
        make_admin($_POST["edit_user_login"]);
    }
}

if (isset($_POST["change_tags"]) && $_POST["change_tags"] =="change tags")
{
  $new_tags = array_filter(explode(',',$_POST["tags"]));
  file_put_contents("privdb/categories", serialize($new_tags));
}


?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>memes go here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/store.css" />

</head>

<body>
    <?php
    make_header('admin');

    
    ?>
    <div class="store">
        <h1>Hello admen.</h1>
        <h2>admin page</h2>
        
        <form action="admin.php" id="edit_tags" method="POST">
            Edit Tags
            <input name="tags" type="text" value="<?php echo implode(",", unserialize(file_get_contents("privdb/categories")));?>">
            <input type="submit" name="change_tags" value="change tags">
        </form>
        <br/>
        <br/>
        <form action="admin.php" name="edit_user" method="POST">
            User:
            <select name="edit_user_login" id="users">
                <?php	
                $userlist = unserialize(file_get_contents("privdb/users"));
                    foreach($userlist as $account) {
                        echo '<option value="';
                        echo $account["login"];
                        echo '">';
                        echo $account["login"]."</option>";
                    }
                ?>
            </select>
            <input type="submit" name="edit_user" value="delete">
            <input type="submit" name="edit_user" value="make admin">
        </form>
            <br/>


         <?php
                if (isset($_POST["delete_item"]) && $_POST["delete_item"] =="delete item")
                {
                    unlink($_POST["product"]);
                }
                if (isset($_POST["change_item"]) && $_POST["change_item"] =="change item")
                {
                    if($_POST["product"] && $_POST["description"] && $_POST["categories"])
                    {
                        file_put_contents($_POST["product"], "tags: ".$_POST["categories"]."\n".$_POST["description"]);
                        echo "updated";
                    }
                    else
                        echo "fill in both fields";
                }
            ?>
            <form action="admin.php" name="change_item" method="POST">
                <h3>Item managenment</h3>
                Store Items:
                <select name="product">
                    <?php   
                        $items = glob('database/*');
                        foreach($items as $item) {
                            echo '<option value="';
                            echo $item;
                            echo '">';
                            echo preg_replace("~database/~", "", $item)."</option>";
                        }

                    ?>
                </select>
                </br>
                Tags: <input type="text" name="categories">
                </br>
                Description: <input type="text" name="description">
                </br>
                <input type="submit" name="delete_item" value="delete item">
                <input type="submit" name="change_item" value="change item">
            </form>
   
                <br/>
                <br/>
                <h4>Add Item</h4>

            <?php
                include "dbfunc/prod_mod/add_prod.php";

                function add_prod_elem(){
      
                    echo '<form name="addprod" action="'.$_SERVER['PHP_SELF'].'" method="POST">'."\n";
                    echo 'New Item: <input name="product" value="">'."\n";
                    echo '<br />'."\n";
                    echo 'Tags: <input name="categories" value="">'."\n";
                    echo '<br />'."\n";
                    echo 'Description: <input name="description" value="">'."\n";
                    echo '<br />'."\n";
                    echo '<input type="submit" name="submit" value="add product">'."\n";
                    echo '</form>'."\n";

                }

                add_prod_elem();
                $accounts = unserialize(file_get_contents("privdb/users"));

                if (isset($_POST["submit"]) &&  $_POST["submit"] = "add product")
                {
                    echo add_prod($accounts, $_POST["product"], $_POST["description"], $_POST["categories"]);
                }
            ?>
    </div>

</body>

</html>
