
<form action="куда отправлять данные" method="post">
    <label for="from">Откуда:</label>
    <input type="text" id="from" name="from"><br><br>
    
    <label for="to">Куда:</label>
    <input type="text" id="to" name="to"><br><br>
    
    <label for="date">Дата:</label>
    <input type="date" id="date" name="date"><br><br>
    
    <label for="passengers">Количество пассажиров:</label>
    <input type="number" id="passengers" name="passengers" min="1"><br><br>
    
    <input type="submit" value="Подтвердить">
</form>
<?php 
// register.php 
 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "users_db"; 
 
// Создаем соединение 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
// Проверяем соединение 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
 
// Получаем данные из формы 
$name = $_POST['name']; 
$email = $_POST['email']; 
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
 
// SQL запрос для вставки данных 
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')"; 
 
if ($conn->query($sql) === TRUE) { 
    echo "Регистрация прошла успешно"; 
} else { 
    echo "Ошибка: " . $sql . "<br>" . $conn->error; 
} 
 
$conn->close(); 
?>s