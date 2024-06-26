<?php
require_once 'inc/header.php';
require_once 'app/classes/User.php';

if ($user->isLogged()) {
    $response -> redirect("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!isset($_POST['name']) || !isset($_POST['username']) ||!isset($_POST['email']) ||!isset($_POST['password'])){
        $response -> sessionMessage("danger", "Error!");
        exit();
    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $created = $user -> create($name, $username, $email, $password);

    if ($created) {
        $response -> sessionMessage("success", "Successfully registred account!");
        $response -> redirect("Location: index.php");
    } else {
        $response -> sessionMessage("danger", "Error!");
        $response -> redirect("Location: register.php");
    }
}

?>

<?php require_once 'inc/header.php' ?>

    <link rel="stylesheet" href="public/css/style.css">

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
    <script src="public/js/Validator.js"></script>
    <script src="public/js/main.js"></script>

<?php require_once 'inc/footer.php'; ?>