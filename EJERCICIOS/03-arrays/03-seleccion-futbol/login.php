<?php
declare(strict_types=1);
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');
?>

<?php
session_start();
require_once('src/functions-structure.php');
myHead('Inicio de sesión');
myMenu();

if (isset($_SESSION['inputsLogin'])) {
    $inputsLogin = $_SESSION['inputsLogin'];
}
if (isset($_SESSION['errorsLogin'])) {
    $errorsLogin = $_SESSION['errorsLogin'];
}
?>
<body>
    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <!-- Muestra los errores del logeo -->
                    <?php if (isset($errorsLogin['login'])) : ?>
                        <div class="alert alert-danger">
                            <?= $errorsLogin['login'] ?>
                        </div>
                    <?php endif ?>
                    <div class="card text-white" style=" background-image: linear-gradient(180deg, blue, white);border-radius: 23px;">
                        <div class="card-body p-5 text-center">
                            <form action="src/validationLogin.php" method="post" class="w-100">
                                <div class="mb-md-4 mt-md-3 ">
                                    <h2 class="fw-bold mb-2 text-uppercase mb-5">Iniciar Sesión</h2>
                                    <!-- Usuario -->
                                    <div class="form-floating form-white">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" value="<?php echo $inputsLogin['username'] ?? '' ?>" placeholder="userexample@gmail.com" />
                                        <label class="text-secondary" for="username">Nombre de usuario</label>
                                        <p style="height: 30px;"><?= $errorsLogin['username'] ?? '' ?></p>
                                    </div>
                                    <!-- Contraseñas -->
                                    <div class="form-floating form-white mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="xxxxxxxx" />
                                        <label class="text-secondary" for="password">Contraseña</label>
                                        <p style="height: 30px;"><?= $errorsLogin['password'] ?? '' ?></p>
                                    </div>
                                    <!-- Boton de login -->
                                    <button class="btn btn-outline-primary btn-light  btn-lg px-5" type="submit">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>