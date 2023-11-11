<?php

// sanitize the inputs
$selected_toppings = filter_input(
    INPUT_POST,
    'pizza_toppings',
    FILTER_SANITIZE_STRING,
    FILTER_REQUIRE_ARRAY
) ?? [];

// select the topping names
$toppings = array_keys($pizza_toppings);

$_SESSION['selected_toppings'] = []; // for storing selected toppings
$total = 0; // for storing total

// check data against the original values
if ($selected_toppings) {
    foreach ($selected_toppings as $topping) {
        if (in_array($topping, $toppings)) {
            $_SESSION['selected_toppings'][] = $topping;
            $total += $pizza_toppings[$topping];
        }
    }
} ?>
<?php if ($_SESSION['selected_toppings']) : ?>
    <h1>Order Summary</h1>
    <ul>
        <?php foreach ($_SESSION['selected_toppings'] as $topping) : ?>
            <li>
                <span><?php echo ucfirst($topping) ?></span>
                <span><?php echo '$' . $pizza_toppings[$topping] ?></span>
            </li>
        <?php endforeach ?>

        <li class="total"><span>Total</span><span><?php echo '$' . $total ?></span></li>
    </ul>
<?php else : ?>
    <p>You didn't select any pizza toppings.</p>
<?php endif ?>
<menu>
    <a class="btn" href="<?php htmlentities($_SERVER['PHP_SELF']) ?>" title="Back to the form">Change Toppings</a>
</menu>