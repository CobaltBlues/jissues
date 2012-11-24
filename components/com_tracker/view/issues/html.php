<?php
/**
 * @package     JTracker
 * @subpackage  com_tracker
 *
 * @copyright   Copyright (C) 2012 Open Source Matters. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * The issues list view
 *
 * @package     JTracker
 * @subpackage  com_tracker
 * @since       1.0
 */
class TrackerViewIssuesHtml extends JViewHtml
{
	/**
	 * Container for the view's items
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $items;

	/**
	 * Redefine the model so the correct type hinting is available.
	 *
	 * @var     TrackerModelIssues
	 * @since   1.0
	 */
	protected $model;

	/**
	 * Pagination object
	 *
	 * @var    JPagination
	 * @since  1.0
	 */
	protected $pagination;

	/**
	 * Method to render the view.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 * @throws  RuntimeException
	 */
	public function render()
	{
		$app = JFactory::getApplication();

		// Register the document
		$this->document = $app->getDocument();

		$this->items      = $this->model->getItems();
		$this->pagination = $this->model->getPagination();
		$this->state      = $this->model->getState();
		$this->fields     = new JRegistry($app->input->get('fields', array(), 'array'));

		// Build the toolbar
		$this->buildToolbar();

		return parent::render();
	}

	/**
	 * Method to build the view's toolbar
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function buildToolbar()
	{
		// Get the user object
		$user = JFactory::getUser();

		// Instantiate the JToolbar object
		$toolbar = JToolbar::getInstance('toolbar');

		// Add a button to submit a new item.
		if ($user->authorise('core.create', 'com_tracker'))
		{
			$toolbar->appendButton('Standard', 'new', 'COM_TRACKER_TOOLBAR_ADD', 'add', false);
		}

		JHtmlSidebar::setAction(htmlspecialchars(JUri::getInstance()->toString()));

		JHtmlSidebar::addFilter(
			JText::_('COM_TRACKER_FILTER_PROJECT'),
			'filter_project',
			JHtmlProjects::select('com_tracker', 'project', (int) $this->fields->get('project'), JText::_('COM_TRACKER_FILTER_PROJECT'))
		);

		JHtmlSidebar::addFilter(
			JText::_('COM_TRACKER_FILTER_STATUS'),
			'filter_status',
			JHtmlSelect::options(JHtmlStatus::filter(), 'value', 'text', $this->state->get('filter.status'))
		);
	}
}
