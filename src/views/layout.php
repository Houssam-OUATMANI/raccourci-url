<!DOCTYPE html>
<html lang="en" data-theme="cyberpunk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body class="container mx-auto">
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a href="/" class="btn btn-ghost text-xl">Raccouri URL</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a>Link</a></li>
                <li>
                    <details>
                        <summary>Auth</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href="/inscription">Inscription</a></li>
                            <li><a href="/connexion">Connexion</a></li>
                            <form action="/deconnexion" method="post">
                                <button class="btn btn-warning btn-xs">Deconnexion</button>
                            </form>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <?php
    $key = "success";
    require __DIR__ . "/components/flash.php";
    ?>
    <?php
    $key = "error";
    require __DIR__ . "/components/flash.php";
    ?>
    <?= $content ?? '' ?>
</body>

</html>