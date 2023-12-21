<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/dist/output.css">
</head>
<body class="bg-black max-w-screen-2xl h-[800px] mx-auto items-center">
    <header class="max-w-screen-xl mx-auto">
        <img class="mr-auto" src="./assets/img/front/login/logoLogin.svg" alt="">
    </header>
    <main class="max-w-screen-xl bg-no-repeat bg-cover bg-bottom h-[690px] grid items-center justify-center mx-auto" style="background-image: url('assets/img/front/login/fondoLogin.svg')">
        <section class="rounded backdrop-blur-[10px] bg-formulario w-[500px] p-[50px]">
            <?php include("./app/vista/templates/login.php")?>
        </section>
    </main>
</body>
</html>