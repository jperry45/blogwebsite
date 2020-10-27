<?php

class Calc {
	public $operator;
	public $num1;
	public $num2;

	public function __construct(string $operator, int $num1, int $num2) {
		$this->operator = $operator;
		$this->num1 = $num1;
		$this->num2 = $num2;
	}

	public function calculate() {
		switch ($this->operator) {
			case 'add':
				$result = $this->num1 + $this->num2;
				return $result;
			case 'sub':
				$result = $this->num1 - $this->num2;
				return $result;
			case 'div':
				$result = $this->num1 / $this->num2;
				return $result;
			case 'mul':
				$result = $this->num1 * $this->num2;
				return $result;
			default:
				echo "Something went wrong...";
				break;
		}
	}
}