<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>

<main id="main-content">
    <section class="banner">
        <div class="">
            <?php if( have_rows('slider') ): ?>
                <div class="slider">
                    <?php

                    $slideNumber = 0;

                    while( have_rows('slider') ): the_row();
                        $slideNumber++;
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $button = get_sub_field('button');
                        $points = get_sub_field('points');
                        ?>
                        <div class="slide" data-id="<?=$slideNumber?>" style="background-image: url('<?php echo esc_url($image); ?>');">
                            <div class="container">
                                <div class="slide-content">
                                    <div class="slider_texts">
                                        <h1><?php echo esc_html($title); ?></h1>
                                        <p><?php echo esc_html($text); ?></p>
                                        <?php if($button): ?>
                                            <a href="<?php echo esc_url($button); ?>" class="book-a-tour-button"><?php echo esc_html('Book a tour'); ?></a>
                                        <?php endif; ?>
                                        <?php if($points): ?>
                                            <ul>
                                                <?php foreach($points as $point): ?>
                                                    <li>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path d="M9.99996 18.3333C14.5833 18.3333 18.3333 14.5833 18.3333 9.99996C18.3333 5.41663 14.5833 1.66663 9.99996 1.66663C5.41663 1.66663 1.66663 5.41663 1.66663 9.99996C1.66663 14.5833 5.41663 18.3333 9.99996 18.3333Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6.45837 10.0001L8.81671 12.3584L13.5417 7.64172" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <?php echo esc_html($point['point']); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>

                                    <div class="slider-pagination">
                                        <div class="page-number"></div>
                                        <div class="pagination-progress">
                                            <div class="pagination-progress-percent"></div>
                                        </div>
                                        <div class="last-page"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="slider-controls">
                    <div class="container">
                        <button class="prev-slide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M15 19.92L8.48003 13.4C7.71003 12.63 7.71003 11.37 8.48003 10.6L15 4.07996" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button class="next-slide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M8.91 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91 4.07996" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="calculator-section">
        <div class="container">
            <div class="calculator-content">
                <?php if (have_rows('text_image')): ?>
                    <?php while (have_rows('text_image')): the_row();
                        $image = get_sub_field('image');
                        $subtitle = get_sub_field('subtitle');
                        $title = get_sub_field('title');
                        $square_miles = get_sub_field('square_miles');
                        $percent_of_national_parks = get_sub_field('percent_of_national_parks');

                        if ($image): ?>
                            <div class="left-image">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="right-text-content">
                            <?php if ($subtitle): ?>
                                <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <h2 class="title"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                            <div class="counters">
                                <?php if ($square_miles): ?>
                                    <p class="square-miles"><?php echo esc_html($square_miles); ?> <span>square miles</span></p>
                                <?php endif; ?>
                                <?php if ($percent_of_national_parks): ?>
                                    <p class="percent-of-national-parks"><?php echo esc_html($percent_of_national_parks); ?>% <span>of Tanzania is National Parks </span></p>
                                <?php endif; ?>
                            </div>
                            <div class="calculator-part">
                                <h3>Vacation calculator</h3>
                                <div class="calculator">
                                    <input type="number" class="number1">
                                    <select class="operation">
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                        <option value="*">*</option>
                                        <option value="/">/</option>
                                    </select>
                                    <input type="number" class="number2">
                                </div>
                                <div class="calculator-result">
                                    <span>Result: </span>
                                    <strong></strong>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>

