<form action="<?php echo home_url( '/' ); ?>" method="get" class="search-form">
  <div class="input">
    <input type="text" id="search" placeholder="Search" name="s" value="<?php the_search_query(); ?>" />
  </div>
  <div class="submit">
    <button type="submit" id="search-button" class="postfix">Search</button>
  </div>
</form>