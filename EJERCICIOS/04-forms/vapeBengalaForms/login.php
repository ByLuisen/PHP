<?php
require_once ('src/functions-structure.php');
myHead('Inicio de sesión');
?>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                        <div class="card-body p-5 text-center">
                            <form action="login.php" class="w-100">

                                <div class="mb-md-4 mt-md-3 ">

                                    <h2 class="fw-bold mb-2 text-uppercase mb-5">Iniciar Sesión</h2>

                                    <div class="form-floating form-white mb-4">
                                        <input type="text" id="typeUserName" name="typeUserName" class="form-control form-control-lg" placeholder="UserName" />
                                        <label class="text-secondary" for="typeUserName">Nombre de usuario</label>
                                    </div>

                                    <div class="form-floating form-white mb-5">
                                        <input type="password" id="typePasswordX" name="typePasswordX" class="form-control form-control-lg" placeholder="xxxxxxx" />
                                        <label class="text-secondary" for="typePasswordX">Contraseña</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar Sesión</button>

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