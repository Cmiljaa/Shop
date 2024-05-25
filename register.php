<?php
require_once 'app/config/config.php';
require_once 'app/classes/User.php';

$user = new User();

if ($user->isLogged()) {
    header("Location: index.php");
    exit();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $created = $user -> create($name, $username, $email, $password);

    if ($created) {
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully registred account!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Error!";
        header("Location: register.php");
        exit();
    }
}

?>

<?php require_once 'inc/header.php' ?>

    <h1 class="mt-5 mb-3">Register</h1>

    <form method="POST" action="">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once 'inc/footer.php'; ?>