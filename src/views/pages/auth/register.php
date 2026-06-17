
<main class="min-h-screen flex items-center justify-center bg-gradient-to-br from-base-200 via-base-100 to-secondary/10 px-4">

    <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300">

        <div class="card-body p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">✨</div>

                <h1 class="text-3xl font-extrabold">
                    Crée ton compte
                </h1>

                <p class="text-base-content/60 mt-2">
                    Rejoins SnapLink et commence à raccourcir tes liens.
                </p>
            </div>

            <form action="" method="post" class="space-y-4">

                <?php
                    $label = "Nom d'utilisateur";
                    $name = "username";
                    $type = "text";
                    require dirname(__DIR__, 2) . "/components/input.php";
                ?>

                <?php
                    $label = "Adresse e-mail";
                    $name = "email";
                    $type = "email";
                    require dirname(__DIR__, 2) . "/components/input.php";
                ?>

                <?php
                    $label = "Mot de passe";
                    $name = "password";
                    $type = "password";
                    require dirname(__DIR__, 2) . "/components/input.php";
                ?>

                <button class="btn btn-primary btn-block rounded-xl mt-6">
                    Créer mon compte 🚀
                </button>

            </form>

            <div class="divider text-base-content/50">
                ou
            </div>

            <p class="text-center text-sm text-base-content/60">
                Déjà un compte ?
                <a href="/connexion" class="link link-primary font-medium">
                    Connecte-toi
                </a>
            </p>

        </div>

    </div>

</main>
