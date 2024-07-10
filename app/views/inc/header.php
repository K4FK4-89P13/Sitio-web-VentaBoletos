<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="http://proyecto.test/public/css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- contenido -->

<div class="content">

    <div class="container-fluid major py-1">

        <div class="navbar navbar-expand-lg w-50 mx-auto my-2">
            <div class="container-fluid align-content-center">
                <a href="http://proyecto.test" class="navbar-brand">HOME</a>
                
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="navbar-nav mr-auto">
                        <a href="http://proyecto.test/login/index" class="nav-link">Registrar</a>
                    </div>

                    <?php if (isset($_SESSION['admin'])): ?>

                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> <!-- Icono de cuenta -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item-text" ><?= $_SESSION['admin']['nombre']?></span>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://proyecto.test/login/logout">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

