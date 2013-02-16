<?php

/**
 * Defines a FormField that uses the Chosen JS plugin for making
 * dropdown fields nice.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class ChosenDropdownField extends DropdownField {



	/**
	 * @var int The number of items that need to appear in the dropdown
	 *			in order to trigger a search bar
	 */
	public static $default_search_threshold = 12;

	/**
	 * Adds text immediately to the left, abut the form field
	 *
	 * @param string $text The text to add
	 * @return BootstrapTextField
	 */
	public function prependText($text) {
		$this->owner->PrependedText = $text;
		return $this->owner;
	}



	/**
	 * Adds text immediately to the right, abut the form field
	 *
	 * @param string $text The text to add
	 * @return BootstrapTextField
	 */
	public function appendText($text) {
		$this->owner->AppendedText = $text;
		return $this->owner;
	}

	public function prependTag($text) {
		$this->owner->PrependedTag = $text;
		return $this->owner;
	}

	public function appendTag($text) {
		$this->owner->AppendedTag = $text;
		return $this->owner;
	}

	/**
	 * Sets the search threshold for this dropdown
	 *
	 * @param int $num The number of items
	 * @return ChosenDropdownField
	 */
	public function setSearchThreshold($num) {
		return $this->setAttribute('data-search-threshold', $num);
	}



	/**
	 * Builds the form field, sets default attributes, and includes JS
	 *
	 * @param array $attributes The attributes to include on the formfield
	 * @return SSViewer
	 */
	public function FieldHolder($attributes = array ()) {
		Requirements::javascript("mysite/javascript/chosen/chosen/chosen.jquery.min.js");
		Requirements::css("mysite/javascript/chosen/chosen/chosen.css");
		$this->addExtraClass('chosen');
		if(!$this->getAttribute('data-search-threshold')) {
			$this->setSearchThreshold(self::$default_search_threshold);
		}
		return parent::FieldHolder($attributes);
	}
}