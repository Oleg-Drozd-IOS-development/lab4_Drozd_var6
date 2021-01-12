<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница 1</title>
</head>
<body>
    <?php
    function foo() {
        $fp = fopen("text1.txt", "r");
        $content = fread($fp, filesize("text1.txt"));
        echo "$content";
        $change = "<form action=\"page1.php\" method=\"post\">
        <p><textarea name=\"edit_file\" cols=\"60\" rows=\"10\">".htmlentities($content)."</textarea></p>
        <p><input type=\"submit\" value=\"changes\"></p>
        </form>"; 
        echo "$change";
        fclose($fp);    
    }
    $func = "foo"; 
    //var_dump($_POST);
    if($_POST["add_row"])
    {
        $fp = fopen("text1.txt", "a"); 
        fwrite($fp, $_POST["add_row"]."\n");
        fclose($fp);
        $_POST = array();
    }
    if($_POST["edit_file"])
    {
        $fp = fopen("text1.txt", "w+"); //очистить и записать из пост едит файл.
        fwrite($fp, $_POST["edit_file"]."\n");
        fclose($fp);
        $_POST = array();
    }
    $func();
    ?>
</html>