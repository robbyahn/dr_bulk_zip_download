<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>

  <div class="grid-search search-results">
  <?php print $list_type_prefix; ?>
    <div class="grid-sizer">&nbsp;</div>
    <?php foreach ($rows as $id => $row): ?>
      <div class="grid-item <?php print $classes_array[$id]; ?>"><?php print $row; ?></div>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
  </div>

<?php print $wrapper_suffix; ?>



