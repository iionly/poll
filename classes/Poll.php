<?php
/**
 * Class that represents an object of subtype poll
 */
class Poll extends ElggObject {
	const SUBTYPE = "poll";

	/**
	 * @var array $responses Cache for number of responses for each voting choice
	 */
	private $responses_by_choice = array();

	/**
	 * @var int $response_count Total amount of responses
	 */
	private $response_count = 0;

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
			'limit' => false,
			'order_by_metadata' => array(
				'name' => 'display_order',
				'direction' => 'ASC',
				'as' => integer
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

		return $deadline > $now;
	}

	/**
	 * Fetch and cache amount of responses for each choice
	 *
	 * Caches the data in form:
	 *     array(
	 *         'choice 1' => 5,
	 *         'choice 2' => 13,
	 *         'choice 3' => 2,
	 *     )
	 */
	private function fetchResponses() {
		if ($this->responses_by_choice) {
			return;
		}

		// Make sure choices without responses are included in the result
		foreach ($this->getChoices() as $choice) {
			$this->responses_by_choice[$choice->text] = 0;
		}

		// Get responses
		$responses = new ElggBatch('elgg_get_annotations', array(
			'guid' => $this->guid,
			'annotation_name' => 'vote',
			'limit' => false,
		));

		// Cache the amount of results for each choice
		foreach ($responses as $response) {
			$this->responses_by_choice[$response->value] += 1;
		}

		// Cache the total amount of responses
		$this->response_count = array_sum($this->responses_by_choice);
	}

	/**
	 * Get amount of responses for the given choice
	 *
	 * @param string $choice
	 * @return int Response count
	 */
	public function getResponseCountForChoice($choice) {
		// Make sure the values have been populated
		$this->fetchResponses();

		return $this->responses_by_choice[$choice];
	}

	/**
	 * Get total amount of responses
	 *
	 * @todo Save the total amount as poll metadata in the voting action
	 *
	 * @return int
	 */
	public function getResponseCount() {
		// Make sure the values have been populated
		$this->fetchResponses();

		return $this->response_count;
	}
}
