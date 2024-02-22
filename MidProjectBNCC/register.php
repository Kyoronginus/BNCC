<?php
    require_once "database/database.php";
    print_r($_POST);
    if (isset($_POST["regisBtn"])){
        register($_POST);
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise Kitchen | Register</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="app bg-dark">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div
                class="card p-4 shadow-sm p-3 mb-5 bg-body-tertiary rounded w-50 d-flex flex-row justify-content-evenly">
                <!-- Register Title -->
                <div class="title d-flex align-items-center">
                    <h1 class="fw-medium lh-base"><span class="fst-italic fw-semibold text-primary">Register</span>
                        <br>Page
                    </h1>
                </div>

                <!-- Register Form -->
                <form action="" method="POST">
                    <!-- First name -->
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="firstname" placeholder="firstname ..."
                            name="firstname">
                        <label for="firstname">First name</label>
                    </div>

                    <!-- Last Name -->
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name ..." name="lastname">
                        <label for="LastName">Last Name</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" placeholder="Email ..." name="email">
                        <label for="email">Email address</label>
                    </div>

                    <!-- Password -->
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" placeholder="Password ..."
                            name="password">
                        <label for="password">Password</label>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="confirm_password"
                            placeholder="Confirm Password ...">
                        <label for="confirm_password">Confirm Password</label>
                    </div>

                    <!-- CheckBox -->
                    <div class="my-3">
                        <input class="form-check-input border border-1 border-black" type="checkbox" value=""
                            id="checkbox" name="checkbox">
                        <label for="checkbox">I agree with <a href="https://github.com/orangeMangoDimz"
                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                target="_blank">terms
                                and policy</a></label>
                    </div>

                    <!-- Register Button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary my-3 w-100" name="regisBtn">
                            Register
                        </button>
                    </div>

                    <!-- Link to Login Page -->
                    <p class="text-center">Already have an account?<br><a href="Login.php"
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Login</a>
                        here</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>