<?php
require_once 'config/connection.php';
include 'views/layouts/header.php';

if (isset($_POST['user']) && isset($_POST['password'])) {
    $name = $_POST['user'];
    $pass = $_POST['password'];
    $sql = "SELECT name,email,password,type FROM users WHERE name=:name and password=:password";
    $statement = $conn->prepare($sql);
    $statement->execute([
        ':name' => htmlspecialchars(trim($name)),
        ':password' => htmlspecialchars(trim($pass))
    ]);

    $currentUser = $statement->fetchAll(PDO::FETCH_OBJ);

    session_start();
    $_SESSION["username"] = $currentUser[0]->name;

    if ($currentUser[0]->type == "admin") {
        $_SESSION["usertype"] = $currentUser[0]->type;
        header("Location: admin-panel.php");
    } else {
        $_SESSION["usertype"] = $currentUser[0]->type;
        header("Location: user-panel.php");
    }
};
?>
<form method="post" class="m-5">
    <div class="mb-3">
        <label for="user" class="form-label"><b>Usuario:</b></label>
        <input type="text" class="form-control form-control-sm" name="user" id="" placeholder="Username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label"><b>Contraseña:</b></label>
        <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" required>
    </div>
    <input type="submit" class="btn btn-primary mb-2" value="Login">
</form>

<?php include 'views/layouts/footer.php'; ?>