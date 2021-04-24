<?php
/**
 * The template part for displaying search results.
 *
 * @package TheFour
 */

get_header(); ?>

<section id="search-page">
    <main>
        <div class="container">
            <?php if ( have_posts() ) : ?>

            <h1><?php _e( 'Search Results Found For', 'thefour-lite' ); ?>: "<?php the_search_query(); ?>" </h1>
            <?php while ( have_posts() ) : the_post(); ?>

            <article>
                <a href="<?php the_permalink(); ?>">
                    <strong><?php the_title(); ?></strong>
                </a>
                <?php the_excerpt(); ?>
                <div class="tags"><?php the_tags(); ?></div>
            </article>
            <?php endwhile; ?>

            <?php
				the_posts_pagination( array(
					'type' 		=> 'list',
					'prev_text' => esc_html__( '&larr; Previous', 'thefour-lite' ),
					'next_text' => esc_html__( 'Next &rarr;', 'thefour-lite' ),
					'screen_reader_text' => esc_html__( ' ', 'thefour-lite' ),
				) );
			?>

            <?php else : ?>
            <h2><?php _e('No post found', 'thefour-lite'); ?></h2>
            <?php endif; ?>

        </div>
    </main>
</section><!-- .content -->

<style>
#search-page .container {
    padding-top: 60px;
    padding-bottom: 60px;
}

#search-page .container article {
    margin: 24px 0px;
}

#search-page .container article .tags {
    font-size: 14px;
    margin-top: 6px;
}

#search-page .container article .tags a {
    text-decoration: underline;
    color: rgb(0, 0, 238);
}

#search-page nav.pagination {
    position: relative;
    display: block;
    margin-top: 64px;
}

#search-page .nav-links {
    position: relative;
}

#search-page .nav-links ul {
    height: auto;
    display: flex;
    justify-content: center;
}

#search-page .nav-links ul li {
    list-style: none;
    margin: 0 10px 0 0;
    padding: 0;
}

#search-page .nav-links ul li span.current {
    padding: 10px 12px;
    background: #777;
    border: 1px solid #777;
    display: block;
    line-height: 1;
    border-radius: 4px;
    color: #fff;
}

#search-page .nav-links ul li a {
    padding: 10px 12px;
    background: #ddd;
    color: #666;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 3px;
    display: block;
    line-height: 1;
}

#search-page .nav-links ul li a:hover {
    background: #999;
    border-color: #888;
    color: #fff;
}
</style>

<?php get_footer(); ?>