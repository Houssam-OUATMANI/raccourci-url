<main class="mt-4">


        <h1 class="text-4xl text-center">Connecte Toi !</h1>


        <form action="" method="post">
             <?php
                $label = "Email";
                $name = "email";
                $type = "email";
                require dirname(__DIR__, 2) . "/components/input.php" ;
            ?>

             <?php
                $label = "Mot de passe";
                $name = "password";
                require dirname(__DIR__, 2) . "/components/input.php" ;
            ?>

            <button class="btn btn-dash btn-primary mt-4">Go !!!</button>

        </form>
</main>