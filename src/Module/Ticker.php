<?php

namespace MEAPI2C\Module;

class Ticker {
    public $last = null;
    public $high = null;
    public $low = null;
    
    public function __construct($args = []) {
        $this->last = $args['last'] ?? null;
        $this->high = $args['high'] ?? null;
        $this->low = $args['low'] ?? null;
    }
}