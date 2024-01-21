<section>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <!-- Muestra los errores del logeo -->
                <?php if (isset($errorsLogin['login'])) : ?>
                    <div class="alert alert-danger">
                        <?= $errorsLogin['login'] ?>
                    </div>
                <?php endif ?>
                <div class="card text-white" style=" background-image: linear-gradient(180deg, blue, white);border-radius: 23px;">
                    <div class="card-body p-5 text-center">
                        <form action="" method="post" class="w-100">
                            <div class="mb-md-4 mt-md-3 ">
                                <h2 class="fw-bold mb-2 text-uppercase mb-5">Iniciar Sesión</h2>
                                <!-- Usuario -->
                                <div class="form-floating form-white">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="userexample@gmail.com" />
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
                                <button type="submit" name="action" value="iniciar_sesion" class="btn btn-outline-primary btn-light btn-lg px-5">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>