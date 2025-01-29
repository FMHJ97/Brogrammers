<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>

</head>

<body>
    <!-- Barra de navegación -->
    <?php include("includes/navbar.php");


    if (isset($_POST["confirm"])) {
        $uNuevo = new Usuario(null, $_POST["name"], $_POST["surname1"], $_POST["surname2"], $_POST["email"], $_POST["pswd"], $_POST["birth"], $_POST["country"], $_POST["postal"], $_POST["phone"], null, $_POST["role"]);
        if (UserController::modificar($uNuevo)) {
            echo "<p class='success'> Usuario modificado correctamente</p>";
        };
    }
    if (isset($_POST["delete"])) {
        if (UserController::delete($_POST["email"])) {
            echo "<p class='success'> Usuario borrado correctamente</p>";
        };
    }
    $users = null;
    if (isset($_POST["todos"]) && !isset($_POST["edit"])) {
        $users = UserController::getAll();
    } else if (isset($_POST["admin"]) && !isset($_POST["edit"])) {
        $users = UserController::getAllByRole("admin");
    } else if (isset($_POST["editor"]) && !isset($_POST["edit"])) {
        $users = UserController::getAllByRole("editor");
    } else if (isset($_POST["usuario"]) && !isset($_POST["edit"])) {
        $users = UserController::getAllByRole("usuario");
    } else if (isset($_POST["buscaNombre"]) && !isset($_POST["edit"])) {
        $users = UserController::getAllByName($_POST["search"]);
    } else $users = UserController::getAll();
    ?>



    <main class="d-block px-3 px-md-0">
        <section class="page-section">

            <div class="container">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="row d-flex text-center page-section-heading">
                    <div class="col">
                        <h3 class="step-title active">Usuarios</h3>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-10 mx-auto px-0 px-md-2">

                        <form class="mb-3" action="" method="post">
                            <div class="btn-category-group">
                                <button type="input" name="todos" class="btn btn-category-item ">Todos</button>
                                <button type="input" name="admin" class="btn btn-category-item">Admin</button>
                                <button type="input" name="editor" class="btn btn-category-item">Editor</button>
                                <button type="input" name="usuario" class="btn btn-category-item">Usuario</button>

                                <div class="px-3 search-bar">
                                    <!-- Input de Búsqueda -->
                                    <input type="text" class="form-control-search" placeholder="Buscar usuarios"
                                        name="search" value="<?php if (isset($_POST["buscaNombre"])) echo $_POST["search"] ?>">
                                    <!-- Botón de Búsqueda -->
                                    <button class="btn btn-search" name="buscaNombre" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if ($users != null && !isset($_POST["edit"])) {
                        ?>
                            <div class="table-responsive-md"> <!-- Hace que la tabla sea responsive -->
                                <!-- Títulos de la tabla -->
                                <table class="table table-cart table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <h5>Nombre</h5>
                                            </th>
                                            <th class="text-center">
                                                <h5>Correo</h5>
                                            </th>
                                            <th class="text-center">
                                                <h5>Rol</h5>
                                            </th>
                                            <th class="text-center">
                                                <h5>Acción</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php

                                    foreach ($users as $u) {
                                        # code...
                                    ?>
                                        <tr>
                                            <form method="post">
                                                <input type="hidden" name="email" value="<?php echo $u->correo ?>">
                                                <td class="text-center no-flex align-middle">
                                                    <?php echo $u->nombre . " " . $u->apellido1 . " " . $u->apellido2 ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?php echo $u->correo ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?php echo $u->rol ?>
                                                </td>
                                                <td class="text-center align-middle"><button class="btn btn-category-item mx-auto" type="input" name="edit">Modificar</button></td>
                                            </form>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </table>
                            <?php
                        } else if (!isset($_POST["edit"])) echo "<p style='error'>No se ha encontrado dicho(s) usuario(s)</p>";
                            ?>
                            </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
        if (isset($_POST["edit"])) {
            $u = UserController::find($_POST["email"]);
        ?>
            <section>
                <div class="container p-4 my-5 authentication-form p-md-5">

                    <!-- Formulario -->
                    <form action="" method="post">
                        <!-- Nombre Input-->
                        <div class="mt-3 mb-3 row">
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="name">Nombre</label><span> *</span>
                                <input type="text" class="form-control" id="name" value="<?php echo $u->nombre ?>"
                                    name="name" required>
                            </div>
                            <!-- Rol -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="role">Rol</label><span> *</span>
                                <select name="role" id="role" class="form-control">
                                    <option value="usuario" <?php if ($u->rol == "usuario") echo "selected" ?>>Usuario</option>
                                    <option value="editor" <?php if ($u->rol == "editor") echo "selected" ?>>Editor</option>
                                    <option value="admin" <?php if ($u->rol == "admin") echo "selected" ?>>Admin</option>
                                </select>

                            </div>
                        </div>
                        <!-- Primer y Segundo apellido Input-->
                        <div class="mt-3 mb-3 row">
                            <!-- Primer apellido -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="surname1">Primer Apellido</label><span> *</span>
                                <input type="text" class="form-control" id="surname1"
                                    value="<?php echo $u->apellido1 ?>" name="surname1" required>
                            </div>
                            <!-- Segundo apellido -->
                            <div class="col-12 col-md-6">
                                <label for="surname2">Segundo Apellido</label>
                                <input type="text" class="form-control" id="surname2"
                                    value="<?php echo $u->apellido2 ?>" name="surname2">
                            </div>
                        </div>
                        <!-- Fecha y País Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Fecha nacimiento -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="birth">Fecha de Nacimiento</label><span> *</span>
                                <input type="date" class="form-control" id="birth"
                                    value="<?php echo $u->fecha_nac ?>" name="birth" required>
                            </div>
                            <!-- País -->
                            <div class="col-12 col-md-6">
                                <label for="country">Pa&iacute;s</label><span> *</span>
                                <input type="text" class="form-control" id="country" value="<?php echo $u->pais ?>"
                                    name="country" required>
                            </div>
                        </div>
                        <!-- Código postal y Teléfono Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Código postal -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="postal">C&oacute;digo Postal</label><span> *</span>
                                <input type="text" class="form-control" id="postal"
                                    value="<?php echo $u->codigo_postal ?>" name="postal" required>
                            </div>
                            <!-- Teléfono -->
                            <div class="col-12 col-md-6">
                                <label for="phone">Tel&eacute;fono</label><span> *</span>
                                <input type="text" class="form-control" id="phone" value="<?php echo $u->telefono ?>"
                                    name="phone" required>
                            </div>
                        </div>
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email">Correo electr&oacute;nico</label><span> *</span>
                            <input readonly type="email" class="form-control" id="email"
                                value="<?php echo $u->correo ?>" name="email" required>
                        </div>
                        <!-- Password y Confirm Password Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Password -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="pwd">Contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                                    name="pswd">
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-12 col-md-6">
                                <label for="pwd2">Confirmar contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd2" placeholder="Confirme su contraseña"
                                    name="pswd2" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small id="passwordHelp" class="form-help">La contraseña debe tener al menos 8
                                caracteres, una mayúscula, una minúscula y un caracter no alfanumérico.</small>
                        </div>

                        <!-- Botón Crear Cuenta -->
                        <div class="d-flex mb-2 flex-column ">
                            <button type="submit" name="confirm" class="btn">Confirmar cambios</button>
                        </div>
                        <div class="d-flex flex-column">
                            <!-- Button 1: Borrar Usuario -->
                            <button id="button1" class="btn" type="button">Borrar Usuario</button>

                            <!-- Button 2: Confirm Submission -->
                            <button id="button2" style="display: none;" type="submit" name="delete" class="btn">¿Estas Seguro?</button>
                        </div>

                        <script>
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.addEventListener("click", function(event) {
                                button2.style.display = "inline";
                                button1.style.display = "none";

                                event.preventDefault();
                            });

                            const form = document.querySelector("form");
                            form.addEventListener("submit", function(event) {
                                if (button2.style.display === "none") {
                                    event.preventDefault();
                                }
                            });
                        </script>

                </div>
                                </form>
                </div>
            <?php
        }
            ?>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>