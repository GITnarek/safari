<?php
/*
Template Name: FAQ Template
*/
?>

<?php get_header(); ?>
<main id="main-content">
    <section class="accordion-section">
        <div class="container">
            <div class="accordion-content">
                <div class="accordion-left-part">
                    <?php if (get_field('subtitle')): ?>
                        <p class="subtitle"><?=get_field('subtitle');?></p>
                    <?php endif; ?>
                    <?php if (get_field('title')): ?>
                        <h2 class="title"><?=get_field('title');?></h2>
                    <?php endif; ?>
                </div>
                <?php if ( have_rows('accordion') ): ?>
                    <div class="accordion">
                        <?php while ( have_rows('accordion') ): the_row(); ?>
                            <div class="accordion-item">
                                <div class="accordion-title">
                                    <?php the_sub_field('accordion_title'); ?>
                                    <span class="accordion-toggle-icon open">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6 12H18" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 18V6" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <span class="accordion-toggle-icon close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6 12H18" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="accordion-text">
                                    <?php the_sub_field('accordion_content'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="calculator-section">
        <div class="container">
            <div class="calculator-content reversed">
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