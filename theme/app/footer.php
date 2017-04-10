        </main>
        <footer class="site-footer">
            <div class="wrapper">
                <section class="site-footer-top">
                    <div class="site-footer-section">
                        <h3>Lillestrøm Fysikalske Institutt</h3>
                        <p>
                            LFI er et moderne tverrfaglig institutt lokalisert
                            på Åråsen Stadion i Lillestrøm.
                        </p>
                        <p>
                            Vi har spesialkompetanse på utredning og behandling
                            av muskel- og skjelettplager og tilbyr profesjonell
                            treningsveiledning og oppfølging over tid. Erfarne
                            terapeuter hjelper deg å ta kontroll over plagene
                            dine og legger til rette for en aktiv hverdag!
                        </p>
                    </div>
                    <div class="site-footer-section">
                        <h3>Spesialiseringer</h3>
                        <nav class="site-footer-menu">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu',
                                    'menu_class' => 'simple-list site-footer-menu',
                                    'container' => ''
                                )
                            ); ?>
                        </nav>
                    </div>
                    <div class="site-footer-section">
                        <h3>Åpningstider</h3>
                        <ul class="simple-list">
                            <?php
                            $opening_hours = preg_split('/\R/', get_theme_mod( 'general_company_opening_hours' ));
                            foreach($opening_hours as $opening_hour) {
                                echo "<li>$opening_hour</li>";
                            }
                            ?>
                        </ul>
                        <div class="button-group">
                            <a href="/timebestilling" class="button mod-full-width">
                                Bestill time
                            </a>
                            <a href="/kontakt" class="button mod-full-width">
                                Kontakt oss
                            </a>
                            <a href="tel:<?php echo str_replace(' ', '', get_theme_mod( 'contact_phone_number' )); ?>" class="button visible-phone">
                                Ring oss på <?php echo get_theme_mod( 'contact_phone_number' ); ?>
                            </a>
                            <a href="#top"
                                class="button visible-phone"
                                data-scroll>
                                Til toppen
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            <section class="site-footer-bottom">
                <div class="wrapper">
                    <?php echo date("Y"); ?> &copy;
                    <?php echo get_theme_mod( 'general_company_name', 'Add your company name here' ); ?>
                    <a href="/cookies" class="site-footer-link">
                        Informasjon om bruk av cookies
                    </a>
                </div>
            </section>
        </footer>
    </div>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-45107598-1', 'auto');
        ga('send', 'pageview');
    </script>
    <?php wp_footer(); ?>
</body>
</html>
