<?php

class Circle {
    private float|int $rayon;

    public function __construct(int|float $rayon = 1) {
        $this->rayon = $rayon;
    }

    public function getRayon(): int|float {
        return $this->rayon;
    }

    public function __toString(): string {
        return "Cercle : $this->rayon (aire : " . (string)$this->calculArea() . ")";
    }

    public function show(): string {
        return sprintf('<div style="background: #18858c; width: %dpx; height: %dpx; border-radius: 50%%"></div>',
            $this->rayon * 10, $this->rayon * 10);
    }

    public function calculArea(): float {
        return pi() * pow($this->getRayon(), 2);
    }
}