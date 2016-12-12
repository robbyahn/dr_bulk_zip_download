<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

/**
 * Process variables for search-result.tpl.php.
 *
 * @see search-result.tpl.php
 */
function nzta_preprocess_search_result(&$variables) {
  // Add node object to result, so we can display imagefield images in results.
  $n = node_load($variables['result']['node']->entity_id);
  $n && ($variables['node'] = $n);
}

