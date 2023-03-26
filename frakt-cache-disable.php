// Lägg till filtret 'woocommerce_checkout_update_order_review' för att rensa WooCommerce-fraktprisernas cache
add_filter('woocommerce_checkout_update_order_review', 'clear_wc_shipping_rates_cache');

// Funktion för att rensa cache för WooCommerce-fraktpriser
function clear_wc_shipping_rates_cache(){
    // Hämta fraktpaketen från WooCommerce-varukorgen
    $packages = WC()->cart->get_shipping_packages();

    // Loopa igenom alla fraktpaket
    foreach ($packages as $key => $value) {
        // Skapa en variabel för fraktsessionen baserat på paketets nyckel
        $shipping_session = "shipping_for_package_$key";

        // Rensa fraktsessionen för det aktuella paketet
        unset(WC()->session->$shipping_session);
    }
}
