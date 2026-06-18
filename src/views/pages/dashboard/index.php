<?php

use App\Entities\Url;

/** @var Url[] $urls */
$urls ??= [];

?>

<main class="max-w-7xl mx-auto px-4 py-8 space-y-8">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-extrabold">
                📊 Tableau de bord
            </h1>

            <p class="text-base-content/60 mt-2">
                Gère et analyse tes liens raccourcis.
            </p>
        </div>

        <a href="/lien/ajouter" class="btn btn-primary rounded-full">
            ➕ Nouveau lien
        </a>

    </div>

    <div class="stats shadow w-full">

        <div class="stat">
            <div class="stat-title">Liens créés</div>
            <div class="stat-value text-primary">
                <?= count($urls) ?>
            </div>
        </div>

    </div>

    <div class="card bg-base-100 shadow-xl border border-base-300">

        <div class="card-body">

            <div class="flex items-center justify-between mb-4">
                <h2 class="card-title">
                    🔗 Mes liens
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="table table-zebra">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>URL d'origine</th>
                            <th>Lien court</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (empty($urls)) : ?>

                            <tr>
                                <td colspan="4" class="text-center py-12 text-base-content/50">
                                    Aucun lien créé pour le moment.
                                </td>
                            </tr>

                        <?php else : ?>

                            <?php foreach ($urls as $url) : ?>

                                <tr>

                                    <td>
                                        <?= $url->id ?>
                                    </td>

                                    <td class="max-w-xs truncate">
                                        <?= htmlspecialchars($url->origin) ?>
                                    </td>

                                    <td>
                                        <a
                                            href="/<?= htmlspecialchars($url->short) ?>"
                                            target="_blank"
                                            class="link link-primary"
                                        >
                                            <?= htmlspecialchars($url->short) ?>
                                        </a>
                                    </td>

                                    <td>

                                        <div class="flex justify-end gap-2">

                                            <a
                                                href="/lien/editer/<?= $url->id ?>"
                                                class="btn btn-sm btn-ghost"
                                            >
                                                ✏️
                                            </a>

                                            <form
                                                action="/lien/supprimer/<?= $url->id ?>"
                                                method="post"
                                                onsubmit="return confirm('Supprimer ce lien ?')"
                                            >
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-error btn-outline"
                                                >
                                                    🗑️
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>
