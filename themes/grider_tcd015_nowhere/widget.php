<?php
      if(is_home()) {
        if(is_active_sidebar('index_side_widget')){ dynamic_sidebar('index_side_widget'); };
      } elseif(is_archive()||is_search()) {
        if(is_active_sidebar('archive_side_widget')){ dynamic_sidebar('archive_side_widget'); };
      } elseif(is_single()) {
        if(is_active_sidebar('single_side_widget')){ dynamic_sidebar('single_side_widget'); };
      } elseif(is_page()) {
        if(is_active_sidebar('page_side_widget')){ dynamic_sidebar('page_side_widget'); };
      };
?>