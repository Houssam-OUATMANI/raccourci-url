<nav class="sticky top-0 z-50 border-b border-base-300 bg-base-100/80 backdrop-blur">

    <div class="navbar max-w-7xl mx-auto px-4">

        <div class="flex-1">
            <a href="/" class="flex items-center gap-2 text-xl font-extrabold tracking-tight">

                <span class="text-2xl">🔗</span>

                <span>
                    SnapLink
                </span>

            </a>
        </div>

        <div class="flex items-center gap-2">
            <a href="/" class="btn btn-ghost rounded-full">
                Accueil
            </a>



            <select id="theme" class="select select-bordered">
                <option value="light">☀️ Clair</option>
                <option value="dark">🌙 Sombre</option>
                <option value="cyberpunk">⚡ Cyberpunk</option>
            </select>


            <?php if (!$session->has('user')) : ?>

                <a href="/connexion" class="btn btn-ghost rounded-full">
                    Connexion
                </a>

                <a href="/inscription" class="btn btn-primary rounded-full">
                    Inscription 🚀
                </a>


            <?php else : ?>

                <div class="dropdown dropdown-end">

                    <button tabindex="0" class="btn btn-ghost btn-circle">
                        <div class="avatar placeholder">
                            <div class="bg-primary text-primary-content rounded-full w-10">
                                <span>
                                    <?= strtoupper(substr($session->get('user')->username ?? 'U', 0, 1)) ?>
                                </span>
                            </div>
                        </div>
                    </button>

                    <ul tabindex="0" class="menu dropdown-content mt-3 z-[1] p-2 shadow-xl bg-base-100 rounded-box w-52 border border-base-300">

                        <li class="menu-title">
                            <span>
                                <?= htmlspecialchars($session->get('user')->username ?? 'Utilisateur') ?>
                            </span>
                        </li>

                        <li>
                            <a href="/tableau-de-bord">
                                📊 Tableau de bord
                            </a>
                        </li>

                        <li>
                            <form action="/deconnexion" method="post">
                                <button class="w-full text-left text-error">
                                    🚪 Déconnexion
                                </button>
                            </form>
                        </li>

                    </ul>

                </div>

            <?php endif; ?>

        </div>

    </div>

</nav>


<script defer>
    const themeSelect = document.querySelector("#theme")
    const htmlElement = document.querySelector("html")

    const theme = () => localStorage.getItem("theme") || "light"
    htmlElement.dataset.theme = theme()


    themeSelect.addEventListener("change", e => {
        localStorage.setItem("theme", e.currentTarget.value);
        htmlElement.dataset.theme = theme()
    })
</script>