<?php
if (have_rows('teachers_information')) : ?>

    <div class="team__wrapper">

        <div class="team__row row">
            <?php
            while (have_rows('teachers_information')) : the_row();
                $avatar = get_sub_field('avatar');
                $fullname = get_sub_field('fullname');
                $position = get_sub_field('position');
                $email = get_sub_field('email');
                $nationality = get_sub_field('nationality');
                $teaching_experience = get_sub_field('teaching_experience');
                $qualifications = get_sub_field('qualifications');
                $description = get_sub_field('description');

            ?>

                <div class="team__item fancybox__getTeam col-4" data-fancybox data-src="#id<?php echo get_row_index(); ?>" data-modal="true" href="javascript:;">
                    <div class="item__img ov-h"><img src="<?php echo $avatar['sizes']['large']; ?>" alt="team"></div>
                    <div class="item__content">
                        <h3><?php echo $fullname; ?></h3>
                        <h4><?php echo $position; ?></h4>
                        <h5>
                        <?php esc_html_e( 'Email', 'thefour-lite' ); ?>: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
                    </div>
                </div>
                <div class="team__popup" id="id<?php echo get_row_index(); ?>" style="display:none">
                    <div class="popup__body">
                        <div class="popBody__nameImg">
                            <div class="img"><img src="<?php echo $avatar['sizes']['large']; ?>" alt="team"></div>
                            <div class="txt">
                                <h3><?php echo $fullname; ?></h3>
                                <h4><?php echo $position; ?></h4>
                            </div>
                        </div> 
                        <div class="popBody__info">
                            <p><?php esc_html_e( 'Nationality', 'thefour-lite' ); ?>: <span><?php echo $nationality; ?></span></p>
                            <p hidden><?php esc_html_e( 'Teaching Experience', 'thefour-lite' ); ?>: <span><?php echo $teaching_experience; ?></span></p>
                            <p hidden><?php esc_html_e( 'Qualifications', 'thefour-lite' ); ?>: <span><?php echo $qualifications; ?></span></p>
                            <p><?php echo $description; ?></p>
                        </div>
                    </div> 
                    <div class="popup__close" data-fancybox-close></div>
                </div>

            <?php
            endwhile;
            ?>

        </div>
    </div>
<?php
else :
// Do something...
endif;
?>