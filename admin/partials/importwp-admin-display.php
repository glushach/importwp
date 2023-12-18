<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://http://wordpress.loc
 * @since      1.0.0
 *
 * @package    Importwp
 * @subpackage Importwp/admin/partials
 */
?>

<div class="xml">
  <h1>Import</h1>
  <form action="" method="post" novalidate="novalidate">
    <div class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Импортировать сейчас"></div>
    <input type="hidden" name="action" value="import">
  </form>
</div>
