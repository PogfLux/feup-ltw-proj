<?php
declare(strict_types=1);
?>

<?php function restaurant_card(Restaurant $restaurant)
{ ?>
    <article id="restaurant-card-<?= $restaurant->restaurantID; ?>" class="shadow-nohov">
        <?php 
            $check = glob("../images/rest_images/rest{$restaurant->restaurantID}.*"); 

            if (empty($check)) $existent_pic = "../images/restaurant_placeholder.png";
            else $existent_pic = $check[0];
        ?>
        <img src=<?= $existent_pic ?> class="rest-img shadow pointer" onclick="window.location.href='../pages/restaurant_profile.php?id=<?= $restaurant->restaurantID; ?>'">
        <section class="restaurant-description">
            <a class="body1 rest-name" href="../pages/restaurant_profile.php?id=<?= $restaurant->restaurantID; ?>"><?= $restaurant->name; ?></a>
            <div class="body2 rating dark-bg shadow-nohov">
                <?= $restaurant->rating; ?><span class="material-icons">star</span>
            </div>
            <div class="genre-list body2">
                <?php
                for ($i = 0; $i < 3; $i++) { 
                    if ($restaurant->categories[$i] != null) {?>
                    <a class="shadow-nohov"><?= $restaurant->categories[$i]?></a>
                <?php }
                } ?>
            </div>
        </section>
    </article>
<?php } ?>

<?php function drawCarousel(array $restaurants)
{ ?>
    <div class="carousel">
        <div id="carousel-container">
            <?php
            for ($i = 0; $i < 3; $i++) {
                restaurant_card($restaurants[$i]);
            }
            ?>
        </div>
        <div class="carousel-preview">
            <?php
                $check = glob("../images/rest_images/rest{$restaurants[0]->restaurantID}.*"); 

                if (empty($check)) $existent_pic = "../images/restaurant_placeholder.png";
                else $existent_pic = $check[0];
            ?>
            <img alt="Restaurant preview picture" src=<?= $existent_pic ?> onclick="snapContent(event, 0, 'carousel-container', 'horizontal')" class="rest-preview active pointer" id="rest-preview-<?= $restaurants[0]->restaurantID; ?>">
            <?php
            for ($i = 1; $i <= 2; $i++) {
                restaurantPreview(false, intval($restaurants[$i]->restaurantID));
            }
            ?>
        </div>
    </div>
<?php } ?>

<?php function restaurantPreview(bool $active, int $id)
{
    $check = glob("../images/rest_images/rest{$id}.*"); 

    if (empty($check)) $existent_pic = "../images/restaurant_placeholder.png";
    else $existent_pic = $check[0];

    if ($active) { ?>
        <img alt="Restaurant preview picture" src=<?= $existent_pic ?> onclick="snapContent(event, 500, 'carousel-container', 'horizontal')" class="rest-preview active pointer" id="rest-preview-<?php echo $id; ?>">
    <?php 
    } else { ?>
        <img alt="Restaurant preview picture" src=<?= $existent_pic ?> onclick="snapContent(event, 500, 'carousel-container', 'horizontal')" class="rest-preview inactive pointer" id="rest-preview-<?php echo $id; ?>">
    <?php } ?>
<?php } ?>

<?php function promos()
{ ?>
    <section class="signup-promo">
        <section class="promo promo-user shadow">
            <img alt="Promotional image" src="../images/promo_2.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Start ordering!</h4>
                <p class="subtitle2">Get food from your favorite restaurants, simply create an account below!</p>
                <a class="subtitle1 register-promo pointer" onclick="showSignup()">Register</a>
            </section>
        </section>
    </section>
<?php } ?>

<?php function promosUser() { ?>
    <section class="signup-promo">
        <section class="promo promo-restaurant shadow">
            <img alt="Promotional image" src="../images/promo_1.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Get your business out there!</h4>
                <p class="subtitle2">Are you a restaurant owner looking to start your business on food delivery?</p>
                <a class="subtitle1 register-promo" onclick="showRestaurantDialog()">Register</a>
            </section>
        </section>
    </section>
<?php } ?>
