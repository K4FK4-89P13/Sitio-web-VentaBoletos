

    <?php include_once './head.html'?>

    <div class="container">
        <div class="card">

            <div class="card-body">
                <h2>Iniciar Sesión</h2>
                <form action="control.php" method="POST">

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
            </div>

        </div>
    </div>

</body>
</html>