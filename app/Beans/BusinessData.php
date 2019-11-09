<?php

namespace App\Beans;

class BusinessData {
	private $mainVariable;
	private $technology;
	private $product1;
	private $product2;

	public function setMainVariable($mainVariable) {
		$this->mainVariable = $mainVariable;
	}

	public function getMainVariable() {
		return $this->mainVariable;
	}

	public function setTechnology($technology) {
		$this->technology = $technology;
	}

	public function getTechnology() {
		return $this->technology;
	}

	public function setProduct1($product1) {
		$this->product1 = $product1;
	}

	public function getProduct1() {
		return $this->product1;
	}

	public function setProduct2($product2) {
		$this->product2 = $product2;
	}

	public function getProduct2() {
		return $this->product2;
	}
}