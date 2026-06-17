
<main class="min-h-screen flex items-center justify-center bg-gradient-to-br from-base-200 via-base-100 to-primary/10 px-4">

    <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300">

        <div class="card-body p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">🔗</div>

                <h1 class="text-3xl font-extrabold">
                    Bon retour
                </h1>

                <p class="text-base-content/60 mt-2">
                    Connecte-toi pour gérer tes liens raccourcis.
                </p>
            </div>

            <form action="" method="post" class="space-y-4">

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

                <button class="btn btn-primary btn-block mt-6 rounded-xl">
                    Se connecter 🚀
                </button>

            </form>

        </div>

    </div>

</main>

