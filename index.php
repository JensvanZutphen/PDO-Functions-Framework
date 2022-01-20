
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CRUD</h1>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    require('function.php');
    if(isset($_POST['submit'])){
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $name = $_POST['name'];
        insert($connection,'crud',$name);
    }
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $all = getAll($connection,'crud');
        foreach($all as $row){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    if(isset($_POST['submit'])){
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $name = $_POST['name'];
        insert($connection,'crud',$name);
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="search" placeholder="Search">
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $search = $_POST['search'];
        $all = search($connection,'crud',$search);
        foreach($all as $row){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "</tr>";
        }
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="id" placeholder="ID">
        <input type="text" name="name" placeholder="Name">
        <input type="submit" name="submit" value="Update">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $id = $_POST['id'];
        $name = $_POST['name'];
        update($connection,'crud',$id,$name);
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="id" placeholder="ID">
        <input type="submit" name="submit" value="Delete">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $connection = getConnection('localhost','root','','boekingen','bowlingbaan');
        $id = $_POST['id'];
        delete($connection,'crud',$id);
    }
    ?>
</body>
</html>