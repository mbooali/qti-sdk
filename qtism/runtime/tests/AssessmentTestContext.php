<?php

namespace qtism\runtime\tests;

use qtism\data\AssessmentItemRefCollection;
use qtism\runtime\common\State;
use qtism\runtime\common\VariableIdentifier;
use qtism\runtime\common\Variable;
use \InvalidArgumentException;
use \OutOfRangeException;
use \OutOfBoundsException;

/**
 * The Context of an AssessmentTest Instance.
 * 
 * AssessmentTextContext objects can run in strict mode. If this mode is enabled, OutOfBoundsException will be thrown
 * if requested (with the bracket ([]) notation variables do not exist in the context. Otherwise, when an unexistent 
 * variable is requested, the NULL value is returned.
 * 
 * @author Jérôme Bogaerts <jerome@taotesting.com>
 *
 */
class AssessmentTestContext extends State {
	
	/**
	 * The collection of AssessmentItemRef objects
	 * that are useful to the AssessmentTestContext.
	 * 
	 * @var AssessmentItemRefCollection
	 */
	private $assessmentItemRefs;
	
	/**
	 * Strict mode enable/disabled.
	 * 
	 * @var boolean
	 */
	private $strictMode = false;
	
	/**
	 * Create a new AssessmentTestContext object.
	 *
	 * @param array $array An optional array of QTI Runtime Model Variable objects.
	 * @param AssessmentItemRefCollection A collection of QTI Data Model AssessmentItemRef objects. In other words, the execution context.
	 * @param boolean $strictMode (optional) Enable the strict mode. Default is false.
	 * @throws InvalidArgumentException If an object of $array is not a Variable object.
	 */
	public function __construct(array $array = array(), AssessmentItemRefCollection $assessmentItemRefs, $strictMode = false) {
		$this->setAssessmentItemRefs((empty($assessmentItemRefs)) ? new AssessmentItemRefCollection() : $assessmentItemRefs);
		parent::__construct($array);
	}
	
	/**
	 * Set the assessmentItemRefs bound to this AssessmentTestContext.
	 * 
	 * @param AssessmentItemRefCollection $assessmentItemRefs A collection of AssessmentItemRef objects.
	 */
	protected function setAssessmentItemRefs(AssessmentItemRefCollection $assessmentItemRefs = null) {
		$this->assessmentItemRefs = $assessmentItemRefs;
	}
	
	/**
	 * Get the assessmentItemRefs bound to this AssessmentTestContext.
	 * 
	 * @return AssessmentItemRefCollection A collection of AssessmentItemRef objects.
	 */
	protected function getAssessmentItemRefs() {
		return $this->assessmentItemRefs;
	}
	
	/**
	 * Enable or disable the strict mode.
	 * 
	 * @param boolean $strictMode Whether enable/disable the strict mode.
	 */
	public function setStrictMode($strictMode) {
		$this->strictMode = $strictMode;
	}
	
	/**
	 * Whether the strict mode is enabled at the moment.
	 * 
	 * @return boolean
	 */
	public function isStrictMode() {
		return $this->strictMode;
	}
	
	/**
	 * Get a weight by using a prefixed identifier e.g. 'Q01.weight1'
	 * where 'Q01' is the item the requested weight belongs to, and 'weight1' is the
	 * actual identifier of the weight.
	 * 
	 * @param string|VariableIdentifier $identifier A prefixed string identifier or a PrefixedVariableName object.
	 * @return false|float The weight corresponding to $identifier or false if such a weight do not exist.
	 * @throws InvalidArgumentException If $identifier is malformed string, not a VariableIdentifier object, or if the VariableIdentifier object has no prefix.
	 */
	public function getWeight($identifier) {
		if (gettype($identifier) === 'string') {
			try {
				$identifier = new VariableIdentifier($identifier);
			}
			catch (InvalidArgumentException $e) {
				$msg = "'${identifier}' is not a valid variable identifier.";
				throw new InvalidArgumentException($msg, 0, $e);
			}
		}
		else if (!$identifier instanceof VariableIdentifier) {
			$msg = "The given identifier argument is not a string, nor a VariableIdentifier object.";
			throw new InvalidArgumentException($msg);
		}
		
		if ($identifier->hasPrefix() === false) {
			$msg = "The given variable identifier '" . $identifier->getIdentifier() . "' has no prefix.";
			throw new InvalidArgumentException($msg);
		}
		
		// get the item the weight should belong to.
		$assessmentItemRefs = $this->getAssessmentItemRefs();
		$expectedItemId = $identifier->getPrefix();
		if (isset($assessmentItemRefs[$expectedItemId])) {
			$weights = $assessmentItemRefs[$expectedItemId]->getWeights();
			
			if (isset($weights[$identifier->getVariableName()])) {
				return $weights[$identifier->getVariableName()];
			}
		}
		
		return false;
	}
	
	/**
	 * Add a variable (Variable object) to the current context.
	 * 
	 * @param Variable $variable A Variable object to add to the current context.
	 * @throws InvalidArgumentException If the identifier of the variable is prefixed by an item identifier, but this is item is not referenced is not referenced in the current context.
	 */
	public function setVariable(Variable $variable) {
		$v = new VariableIdentifier($variable->getIdentifier());
		
		if ($v->hasPrefix() === true) {
			// Check if the corresponding itemRef is registered.
			$items = $this->getAssessmentItemRefs();
			if (isset($items[$v->getPrefix()]) === false) {
				$prefix = $v->getPrefix();
				$msg = "No assessmentItemRef with identifier '${prefix}' found.";
				throw new InvalidArgumentException($msg);
			}	
		}
		
		$data = &$this->getDataPlaceHolder();
		$data[$v->getIdentifier()] = $variable;
	}
	
	/**
	 * Get a variable value from the current context using the bracket ([]) notation.
	 * 
	 * @return mixed A QTI Runtime compliant value or NULL if no such value can be retrieved for $offset.
	 * @throws OutOfRangeException If $offset is not a string or $offset is not a valid variable identifier.
	 * @throws OutOfBoundsException If strict mode enabled only. If a variable cannot be found.
	 */
	public function offsetGet($offset) {
		
		if (gettype($offset) !== 'string') {
			$msg = "An AssessmentTestContext object must be addressed by string.";
			throw new OutOfRangeException($msg);
		}
		
		try {
			$v = new VariableIdentifier($offset);
			$data = &$this->getDataPlaceHolder();
			
			if ($v->hasPrefix() === false) {
				// Simple variable name.
				// -> This means the requested variable is in the global test scope.
				$varName = $v->getVariableName();
				if (isset($data[$varName]) === false) {
					if ($this->isStrictMode() === true) {
						$msg = "AssessmentTestContext strict mode enabled. No variable '${varName}' found in the current context.";
						throw new OutOfBoundsException($msg);
					}
					else {
						return null;
					}
				}
				
				return $data[$v->__toString()]->getValue();
			}
			else {
				// Prefixed variable Name.
				// -> The prefix is always an item identifier. Is it referenced ?
				$itemId = $v->getPrefix();
				if ($this->isItemReferenced($itemId) === false) {
					// The test does not contain the requested item.
					if ($this->isStrictMode() === true) {
						$msg = "AssessmentTestContext strict mode enabled. No item '${itemId}' referenced in the current context.";
						throw new OutOfBoundsException($msg);
					}
					else {
						return null;
					}
				}
				else if (isset($data[$v->__toString()])) {
					return $data[$v->__toString()]->getValue();
				}
				else if ($this->isStrictMode() === true) {
					$msg = "AssessmentTestContext strict mode enabled. No variable '" . $v->getVariableName() . "' found for item '" . $v->getPrefix() . "'.";
					throw new OutOfBoundsException($msg);
				}
				else {
					return null;
				}
			}
		}
		catch (InvalidArgumentException $e) {
			$msg = "AssessmentTestContext object addressed with an invalid identifier '${offset}'.";
			throw new OutOfRangeException($msg, 0, $e);
		}
	}
	
	/**
	 * Set the value of a variable with identifier $offset. Offset cannot contain a sequence number. Indeed,
	 * the AssessmentTestContext object takes care itself of the sequencing of the values. It cannot be done manually.
	 * 
	 * @throws OutOfRangeException If $offset is not a string or an invalid variable identifier.
	 * @throws OutOfBoundsException If a variable cannot be found or if trying to set a variable's value with a sequence number.
	 */
	public function offsetSet($offset, $value) {
		
		if (gettype($offset) !== 'string') {
			$msg = "An AssessmentTestContext object must be addressed by string.";
			throw new OutOfRangeException($msg);
		}
		
		try {
			$v = new VariableIdentifier($offset);
			$data = &$this->getDataPlaceHolder();
			
			if ($v->hasPrefix() === false) {
				// global scope request.
				$varName = $v->getVariableName();
				if (isset($data[$varName]) === false) {
					$msg = "The variable '${varName}' to be set does not exist in the current context.";
					throw new OutOfBoundsException($msg);
				}
				
				$data[$v->__toString()]->setValue($value);
			}
			else if ($v->hasSequenceNumber() === false) {
				// prefix given, no sequence number
				$itemId = $v->getPrefix();
				if ($this->isItemReferenced($itemId) === false) {
					$msg = "No item '${itemId}' referenced in the current context while setting variable '${v}'.";
					throw new OutOfBoundsException($msg);
				}
				else if (isset($data[$v->__toString()])) {
					$data[$v->__toString()]->setValue($value);
				}
				else {
					$msg = "No variable '" . $v->getVariableName() . "' found for item '" . $v->getPrefix() . "'.";
					throw new OutOfBoundsException($msg);
				}
			}
			else {
				// prefix and sequence number given.
				$msg = "The variable '${v}' cannot be set using a sequence number.";
				throw new OutOfBoundsException($msg);
			}
		}
		catch (InvalidArgumentException $e) {
			// Invalid variable identifier.
			$msg = "AssessmentTestContext object addressed with an invalid identifier '${offset}'.";
			throw new OutOfRangeException($msg, 0, $e);
		}
	}
	
	/**
	 * Unset a given variable's value identified by $offset from the current context.
	 * Please not that unsetting a variable's value keep the variable still instantiated
	 * in the context with the previous value replaced by NULL.
	 * 
	 * If strict mode is enabled, an OutOfBoundsException will be thrown if:
	 * 
	 * * The $offset contains a sequence number.
	 * * The $offset refers to an unexistent variable.
	 * 
	 * @param string $offset
	 * @throws OutOfRangeException
	 * @throws OutOfBoundsException
	 */
	public function offsetUnset($offset) {
		$data = &$this->getDataPlaceHolder();
		
		// Valid identifier?
		try {
			$v = new VariableIdentifier($offset);
		}
		catch (InvalidArgumentException $e) {
			$msg = "The variable identifier '${offset}' is invalid.";
			throw new OutOfRangeException($msg, 0, $e);
		}
		
		if ($v->hasSequenceNumber() === true) {
			$msg = "Variables contained in AssessmentTestContext objects cannot be unset with a sequence number.";
			throw new OutOfBoundsException($msg);
		}
		
		if ($this->isStrictMode() === true) {
			if ($v->hasPrefix() === true && $this->isItemReferenced($v->getPrefix()) === false) {
				$msg = "AssessmentTestContext strict mode enabled. The item '" . $v->getPrefix() . "' is not referenced in the current context.";
				throw new OutOfBoundsException($msg);
			}
			else if (isset($data[$v->__toString()])) {
				$data[$v->__toString()]->setValue(null);
			}
			else {
				$msg = "No variable '" . $v->getVariableName() . "' found for item '" . $v->getPrefix() . "' in the current context.";
				throw new OutOfBoundsException($msg);
			}
		}
		else {
			// No strict mode.
			if (isset($data[$v->__toString()]) === true) {
				$data[$v->__toString()]->setValue(null);
			}
		}
	}
	
	/**
	 * Whether a item with identifier $itemIdentifier is referenced in the current context.
	 * 
	 * @param string $itemIdentifier The identifier of an item you want to know if it's referenced.
	 * @return boolean Whether the item is referenced or not.
	 */
	protected function isItemReferenced($itemIdentifier) {
		$items = $this->getAssessmentItemRefs();
		return isset($items[$itemIdentifier]);
	}
}