<?php session_start(); 
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











<style>
*{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
body {
    background-color: black;
}


form {
    width: 60%;
    float: left;
    margin-left: 20%;
    margin-top: 30px;
    background-color: #f0f0f0;
    padding-top: 15px;
    padding-bottom: 15px;
    border-radius: 15px;
}

form input[type=date] {
    width: 20%;
    float: right;
    font-size: 16px;
    margin-right: 50px;
}
form input {
    width: 50%;
    float: left;

    line-height: 40px;
    border-radius: 10px;
    text-align: center;

    font-size: 24px;
    margin-left: 50px;

    border: solid 2px black;
}

form button {
    width: 60%;
    float: left;
    margin-left: 20%;
    margin-top: 20px;
    line-height: 40px;
    border: none;
    background-color: black;
    color: #f0f0f0;
    font-size: 24px;
    border-radius: 15px;
    cursor: pointer;
}




div {
    width: 60%;
    float: left;
    margin-left: 20%;
    margin-top: 30px;
    border-radius: 15px;

    padding-top: 20px;
    padding-bottom: 20px;
    background-color: #f0f0f0;
}

div h1 {
    width: 100%;
    float: left;
    text-align: center;
}






table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>