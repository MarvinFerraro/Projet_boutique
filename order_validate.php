<?php
session_start();
include('include/head.php');
var_dump($_SESSION);
$price_total = $_SESSION['somme'];
$orders= [
    'numero' => '23COtest',
    'price' => $price_total,
    'total_weight' => 1,
];
var_dump($_SESSION['panier']);
//add_order($bdd, $orders);
//
//foreach ($_SESSION['quantity'] as $id => $quantity) {
//    add_article_orders($bdd,$id, $quantity);
//}
?>
<p class="price">Merci ! Votre commande a bien été prise en compte.</p>

<?php
include('include/footer.php');
