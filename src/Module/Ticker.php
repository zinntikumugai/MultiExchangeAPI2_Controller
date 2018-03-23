<?php

namespace MEAPI2C\Module;

class Ticker {
    public $market = null;
    public $last = null;
    public $high = null;
    public $low = null;
    
    public function __construct($args = []) {
        $this->market = $args['market'] ?? null;
        $this->last = $args['last'] ?? null;
        $this->high = $args['high'] ?? null;
        $this->low = $args['low'] ?? null;
    }
}