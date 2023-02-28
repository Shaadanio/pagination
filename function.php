<?php

// samka pagination function

function shaadan_pagination() {
    global $paged, $wp_query;

    if (empty($paged)) {
        $paged = 1;
    }

    $pages = $wp_query->max_num_pages;
    if (!$pages) {
        $pages = 1;
    }

    if (1 != $pages):

        $input_width = strlen((string)$pages) + 3;
?>
<div class="pagination_block">
    <nav>
        <ul class="pagination">

            <?php if ($paged == 1): ?>
            <li class="disabled"><span>&lsaquo;</span></li>
            <?php else: ?>
                <li class="next_pagin"><a href="<?php echo get_pagenum_link($paged-1); ?>" aria-label="Previous">&lsaquo;</a></li>
            <?php endif; ?>

            <?php $start_page = min(max($paged - 2, 1), max($pages - 4, 1)); ?>
            <?php $end_page   = min(max($paged + 2, 5), $pages); ?>

            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                <?php if ($paged == $i): ?>
                    <li class="active"><span><?php echo $i; ?></span></li>
                <?php else: ?>
                    <li><a href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

			<? if( $i < $pages){?>

				<li><span>...</span></li>
				
				<li><a href="<?php echo get_pagenum_link($pages); ?>"><? echo $pages;?></a></li>

			<?}?>

            <?php if ($paged == $pages): ?>
                <li class="disabled"><span>&rsaquo;</span></li>
            <?php else: ?>
                <li class="next_pagin"><a href="<?php echo get_pagenum_link($paged+1); ?>" aria-label="Next">&rsaquo;</a></li>
            <?php endif; ?>

        </ul>
    </nav>
</div>
<?php
    endif;
}
