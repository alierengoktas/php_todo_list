<?php session_start(); ?>
<link rel="stylesheet" href="style.css">

<?php 
// if the add todo button is pressed
    if(isset($_POST['addTodo'])){

        $todoArray = array(
            "Todo" => $_POST['ToDo'],
            "Date" => $_POST['ToDoDate']
        );

        $_SESSION["todoList"][$_POST['ToDo']] = $todoArray;
        header('Location:index.php');

    }
    
// if the delete button is pressed
    if(isset($_GET['delete'])){
        unset($_SESSION['todoList'][$_GET['delete']]);
        header('Location:index.php');
    } ?>




<form method="post">
    <input type="text" name="ToDo" placeholder="To Do" required>
    <input type="date" name="ToDoDate" required>

    <button type="submit" name="addTodo">Add To Do</button>
</form>



<div>

<?php 
    if(!isset($_SESSION['todoList']) or count($_SESSION['todoList']) <= 0){
            echo "<h1>Empty To Do List</h1>";
}else{ ?>

<table>
  <tr>
    <th>To Do</th>
    <th>Date</th>
    <th></th>
  </tr>
  <?php foreach($_SESSION['todoList'] as $list){ ?>
    <tr>
        <td><?= $list['Todo'] ?></td>
        <td><?= $list['Date'] ?></td>
        <td><a href="?delete=<?= $list['Todo'] ?>">Delete</a></td>
    </tr>
<?php } ?>
</table>

<?php } ?>
</div>







