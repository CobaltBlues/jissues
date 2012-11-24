<?php
/**
 * @package     JTracker
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/* @var UsersViewLoginHtml $this */

defined('_JEXEC') or die;
?>
<div class="row-fluid">
<?php
		if ($this->user->get('guest')):
			// The user is not logged in.
			include $this->getPath('login');
		else:
			// The user is already logged in.
			include $this->getPath('logout');
		endif;

?>
</div>


