
<section class="cat">
  <h4 class="side-ttl">Category</h4>
  <ul>
    <?php
    $args = array(
    'taxonomy' => 'news_category'
    );
    $categories = get_categories($args);
    foreach($categories as $category) {
    echo '<li><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
    }
    ?>
  </ul>
</section>
<section class="archive">
  <h4 class="side-ttl">Archive</h4>
  <ul>
    <?php
    $string = wp_get_archives(array(
    'post_type'     => 'news',
    'show_post_count' => 1,
    'echo' => 0
    ));
    echo preg_replace('/<\/a>&nbsp;(\([0-9]*\))/', ' <span class="count">$1</span></a>', $string);
    ?>
  </ul>
</section>