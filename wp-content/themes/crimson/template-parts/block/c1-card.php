<?php

$cards = get_field('cards');

?>

<section class="block-cards">
    <div class="cards-outer">
        <h2 class="section-title">Why Does C1 Partners work?</h2>
        <div class="cards-inner">
        
            <?php foreach($cards as $card) :
                $cardImage = $card['card_image']['url'];
                $cardTitle = $card['card_title'];
                $cardDesc  = $card['card_desc'];
            ?>
            
            <article class="card-container">
                <div class="card-shadow">
                    <div class="thumbnail-wrap">
                        <figure class="thumbnail">
                            <?php if($cardImage): ?>
                            <img src="<?php echo $cardImage ?>" height="40px" width="30px" />
                            <?php endif; ?>
                        </figure>
                        <h3 class="card-title"><?php echo $cardTitle ?></h3>
                    </div>
                    <div class="inner">   
                        <p class="card-description"><?php echo $cardDesc; ?></p>
                    </div>    
                </div>
            </article>

            <?php endforeach; ?>

        </div>
    </div>
</section>