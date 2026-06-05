<main class="mt-4">


        <h1 class="text-4xl text-center">Inscrit Toi !</h1>


        <form action="" method="post">

            <?php
                $label = "Nom d'utilisateur";
                $name = "username";
                require dirname(__DIR__, 2) . "/components/input.php" ;
            ?>

             <?php
                $label = "Email";
                $name = "email";
                $type = "email";
                require dirname(__DIR__, 2) . "/components/input.php" ;
            ?>

             <?php
                $label = "Mot de passe";
                $name = "password";
                $type = "password";
                require dirname(__DIR__, 2) . "/components/input.php" ;
            ?>

            <button class="btn btn-dash btn-primary mt-4">Go !!!</button>

        </form>
</main>