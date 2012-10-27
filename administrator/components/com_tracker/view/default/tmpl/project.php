<?php
/**
 * @package     JTracker
 * @subpackage  com_tracker
 *
 * @copyright   Copyright (C) 2012 Open Source Matters. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="row">
    <div class="span12">
        <h2>Categories</h2>
		<?= JHtmlProjects::listing('com_tracker.' . $project . '.categories') ? : 'Use global' ?>
    </div>
</div>
<div class="row">
    <div class="span4">
        <h2>Textfields</h2>
		<?= JHtmlProjects::listing('com_tracker.' . $project . '.textfields') ? : 'Use global' ?>
    </div>
    <div class="span4">
        <h2>Selectlists</h2>
		<?= JHtmlProjects::listing('com_tracker.' . $project . '.fields') ? : 'Use global' ?>
    </div>
    <div class="span4">
        <h2>Checkboxes</h2>
		<?= JHtmlProjects::listing('com_tracker.' . $project . '.checkboxes') ? : 'Use global' ?>
    </div>
</div>

