<?php

declare(strict_types=1);

myHead('Editar Contacto');

if (isset($_SESSION['inputs'])) {
    $inputs = $_SESSION['inputs'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
?>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <!-- Muestra si el contacto ha sido editado correctamente -->
                    <?php if (isset($_SESSION['editado'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['editado'] ?>
                        </div>
                    <?php endif ?>
                    <div class="card text-white" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                        <div class="card-body p-5 text-center">
                            <form action="src/validationAlta.php" method="post" class="w-100">
                                <div class="mt-md-3 ">
                                    <h2 class="fw-bold mb-2 text-uppercase mb-5">Editar contacto</h2>
                                    <!-- Nombre -->
                                    <div class="form-floating form-white">
                                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="<?php echo $contacto->getNombre() ?>" placeholder="Pepe" />
                                        <label class="text-secondary" for="nombre">Nombre</label>
                                        <p style="height: 30px;"><?= $errors['nombre'] ?? '' ?></p>
                                    </div>
                                    <!-- Apellidos -->
                                    <div class="form-floating form-white">
                                        <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg" value="<?php echo $contacto->getApellidos() ?>" placeholder="Ortiz Gimenez" />
                                        <label class="text-secondary" for="apellidos">Apellidos</label>
                                        <p style="height: 30px;"><?= $errors['apellidos'] ?? '' ?></p>
                                    </div>
                                    <!-- Fecha de nacimiento -->
                                    <div class="form-floating form-white">
                                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-lg" max="<?php echo date('Y-m-d'); ?>" value="<?php echo DateTime::createFromFormat('d/m/Y', $contacto->getFechaNacimiento())->format('Y-m-d'); ?>" />
                                        <label class="text-secondary" for="fecha_nacimiento">Fecha de nacimiento</label>
                                        <p style="height: 60px;"><?= $errors['fecha_nacimiento'] ?? '' ?></p>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-floating form-white mb-4">
                                        <input type="text" id="email" name="email" class="form-control form-control-lg" value="<?php echo $contacto->getEmail() ?>" placeholder="pepeOrtiz@gmail.com" />
                                        <label class="text-secondary" for="email">Email</label>
                                        <p style="height: 30px;"><?= $errors['email'] ?? '' ?></p>
                                    </div>
                                    <!-- Boton dar de alta -->
                                    <button class="btn btn-danger btn-outline-light btn-lg px-5" type="submit">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p><a href="index.php">Volver al inicio</a></p>
</body>

<?php
session_unset();
?>

</html>