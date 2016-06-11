<?php get_header(); ?>
<div class="wrapper">
    <h1>Kunne ikke finne siden</h1>
    <p class="lead">
        Det ser ut til at du har kommet til en side som ikke finnes. Det kan
        hende at du har skrevet inn feil adresse, eller at du trykket på en
        utdatert lenke.
    </p>
    <div class="button-group">
        <a href="<?php echo get_home_url(); ?>" class="button">Til forsiden</a>
    </div>
</div>
<?php get_footer(); ?>
