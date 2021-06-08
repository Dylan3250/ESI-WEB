<?php

class Point {
    private float|int $x;
    private float|int $y;

    public function __construct(float|int $ax = 0, float|int $ay = 0) {
        $this->x = $ax;
        $this->y = $ay;
    }

    public function __toString() : string {
        return "($this->x,$this->y)";
    }

    public function getX() : float|int{
        return $this->x;
    }

    public function getY() : float|int {
        return $this->y;
    }

    public function distanceTo(Point &$p): float|int {
        return sqrt(pow(($p->getX() - $this->getX()),2)
            + pow(($p->getY() - $this->getY()),2));
    }

    public function middle(Point &$p) : Point {
        return new Point(($p->getX() + $this->getX()) / 2, ($p->getY() + $this->getY()) / 2);
    }
}
