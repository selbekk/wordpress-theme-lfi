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
                            <li>Mandag - torsdag 07 - 21</li>
                            <li>Fredag 07 - 16</li>
                        </ul>
                        <div class="button-group">
                            <a href="https://timebestilling.physica.no/clinic?clinic=p1992" class="button mod-full-width">
                                Bestill time
                            </a>
                            <a href="/kontakt" class="button mod-full-width">
                                Kontakt oss
                            </a>
                            <a href="tel:64843400" class="button visible-phone">
                                Ring oss på 648 43 400
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
                    Lillestrøm Fysikalske Institutt.
                    <a href="/cookies" class="site-footer-link">
                        Informasjon om bruk av cookies
                    </a>
                </div>
            </section>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
