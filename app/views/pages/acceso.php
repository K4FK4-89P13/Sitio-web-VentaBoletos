<?php require_once __DIR__ . '/../inc/header.php' ?>
    
    <div class="container">
        <div class="card w-50 mx-auto mt-5">

            <div class="card-body">
                <h2>Iniciar Sesión</h2>

                <form method="POST" action="http://proyecto.test/login/login">

                    <div class="mb-2">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control">
                    </div>
                    
                    <div class="mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <input type="submit" value="INGRESAR" class="btn btn-primary">
                </form>

                <div >
                    <?php if (isset($data['error'])) {
                        echo <<<_END
                            <div class='alert alert-danger mt-2'>
                                {$data['error']}
                            </div>
                        _END;
                    } ?>
                </div>

            </div>
        </div>
    </div>

<?php require_once __DIR__ . '/../inc/footer.php' ?>