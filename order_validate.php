<?php
session_start();
require 'include/functionsSQL.php';
include('include/head.php');
$price_total = $_SESSION['somme'];
$orders= [
    'price' => $price_total,
];

add_order($bdd, $orders);

foreach ($_SESSION['quantity'] as $id => $quantity) {
    add_article_orders($bdd,$id, $quantity);
}
?>
<p class="price">Merci ! Votre commande a bien été prise en compte.</p>

<?php
include('include/footer.php');
