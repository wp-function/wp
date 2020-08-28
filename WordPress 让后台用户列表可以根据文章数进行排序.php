<?php

//文章数排序
/*
Plugin Name: Sort Users by Post Count
Description: Add a column to the Users page in the admin to sort users by post counts.https://github.com/ksemel/sort-users-by-post-count
Version: 1.0
Author: Katherine Semel
*/
if ( ! class_exists('Sort_Users_By_Post_Count') ) {
    class Sort_Users_By_Post_Count {
        function Sort_Users_By_Post_Count() {
            // Make user table sortable by post count
            add_filter( 'manage_users_sortable_columns', array( $this, 'add_custom_user_sorts' ) );
        }
        /* Add sorting by post count to user page */
        function add_custom_user_sorts( $columns ) {
            $columns['posts'] = 'post_count';
            return $columns;
        }
    }
    $Sort_Users_By_Post_Count = new Sort_Users_By_Post_Count();
}