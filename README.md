# rensa-frakt-cache-automatiskt
Rensa frakt cache automatiskt, praktiskt om du har problem med utcheckning och behöver felsöka utan att visa meddelande i frontend.

# WooCommerce Fraktpriser Cache Rensning

Det här PHP-snippetet rensar WooCommerce-fraktprisernas cache varje gång en användare uppdaterar sin orderöversikt i kassan. Detta kan vara användbart om du har anpassade fraktberäkningar som behöver uppdateras i realtid när kunden ändrar sin kundvagn.

## Hur man använder det

1. Kopiera koden nedan:

-----------------------------------------------------------------------------------------

add_filter('woocommerce_checkout_update_order_review', 'clear_wc_shipping_rates_cache');

function clear_wc_shipping_rates_cache(){
    $packages = WC()->cart->get_shipping_packages();

    foreach ($packages as $key => $value) {
        $shipping_session = "shipping_for_package_$key";

        unset(WC()->session->$shipping_session);
    }
}

---------------------------------------------------------------------------------------

Öppna din WordPress-webbplats functions.php-fil som finns i ditt temas katalog (t.ex. wp-content/themes/ditt-tema/functions.php).

Klistra in koden i slutet av functions.php-filen, spara och stäng filen.

Testa din webbplats för att säkerställa att fraktprisernas cache rensas korrekt när en användare uppdaterar sin orderöversikt i kassan.

Observera att det är rekommenderat att skapa ett barn-tema för att lägga till anpassad kod som denna, eftersom uppdateringar av huvudtemat kan skriva över dina ändringar.
