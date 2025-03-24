<?php get_header(); ?>

<main class="erreur404 global">
    <section class="erreur404__contenu">
        <h1 class="erreur404__titre">404 - Page non trouvée</h1>
        <p class="erreur404__message">Oups ! La page que vous cherchez n'existe pas ou a été déplacée.</p>
        <a href="<?php echo home_url(); ?>" class="erreur404__lien">Retour à l'accueil</a>
    </section>
</main>

<?php get_footer(); ?>
