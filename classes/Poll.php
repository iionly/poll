<?php
/**
 * Class that represents an object of subtype poll
 */
class Poll extends ElggObject {
	const SUBTYPE = "poll";

	/**
	 * Set subtype
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = $this::SUBTYPE;
	}

	/**
	 * Check whether the user has voted in this poll
	 *
	 * @param ElggUser $user
	 * @return boolean
	 */
	public function hasVoted($user) {
		$votes = elgg_get_annotations(array(
			'guid' => $this->guid,
			'type' => "object",
			'subtype' => "poll",
			'annotation_name' => "vote",
			'annotation_owner_guid' => $user->guid,
			'limit' => 1
		));

		if ($votes) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get choice objects
	 *
	 * @return ElggObject[] $choices
	 */
	public function getChoices() {
		$choices = $this->getEntitiesFromRelationship(array(
			'relationship' => 'poll_choice',
			'inverse_relationship' => true,
			'order_by_metadata' => array(
				'name' => 'display_order',
				'direction' => 'ASC'
			),
		));

		if (!$choices) {
			$choices = array();
		}

		return $choices;
	}

	/**
	 * Delete all choices associated with this poll
	 */
	public function deleteChoices() {
		foreach ($this->getChoices() as $choice) {
			$choice->delete();
		}
	}

	/**
	 * Adds or updates poll choices
	 *
	 * @param array $choices
	 */
	public function setChoices(array $choices) {
		if (empty($choices)) {
			return false;
		}

		$this->deleteChoices();

		$i = 0;
		foreach ($choices as $choice) {
			$poll_choice = new ElggObject();
			$poll_choice->owner_guid = $this->owner_guid;
			$poll_choice->container_guid = $this->container_guid;
			$poll_choice->subtype = "poll_choice";
			$poll_choice->text = $choice;
			$poll_choice->display_order = $i*10;
			$poll_choice->access_id = $this->access_id;
			$poll_choice->save();

			add_entity_relationship($poll_choice->guid, 'poll_choice', $this->guid);
			$i += 1;
		}
	}

	/**
	 * Is the poll open for new votes?
	 *
	 * @return boolean
	 */
	public function isOpen() {
		if (empty($this->close_date)) {
			// There is no closing date so this poll is always open
			return true;
		}

		$now = time();

		// input/date saves beginning of day and we want to include closing date day in poll
		$deadline = $this->close_date + 86400;

		return $deadline < $now;
	}
}
