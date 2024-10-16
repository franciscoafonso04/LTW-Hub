<?php declare(strict_types = 1); ?>

<?php function drawCategory(array $products) { ?>
    <main>
        <div class="item-list">
            <h2><?php echo htmlspecialchars($products[0]['categoryName'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <div class="flex-container">
                <div class="flex-row">
                    <?php drawProductCard($products) ?>
                </div>
            </div>
        </div>
    </main>
<?php } ?>
