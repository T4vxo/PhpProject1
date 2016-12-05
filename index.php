<!--index.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './script.php';   
        
        if(isset($_GET["delete"])){
            deleteProduct($_GET["delete"]);
        }
        if(isset($_POST["name"])){
            //säkerhet saknas!
            insertProduct($_POST["name"],$_POST["text"],$_POST["price"]);
        }
        
        getTable();        
        ?>
        <form method="POST">
            <label>namn:<input type="text" name="name" /></label><br/>
            <label>text:<input type="text" name="text" /></label><br/>
            <label>pris:<input type="number" name="price" /></label><br/>
            <label>pris:<input type="submit" value="Lägg till" /></label>
        </form>       

    </body>
</html>
