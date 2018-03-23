<?php

namespace MEAPI2C\Module;

class Pairs {
    public $fast = null;
    public $second = null;
    public $symbol = null;
    public $is_slow = null;
    public $exchange = null;

    public function __construct($args = []) {
        $this->fast = $args['fast'] ?? null;
        $this->second = $args['second'] ?? null;
        $this->symbol = $args['symbol'] ?? null;

        $this->is_slow = $args['is_slow'] ?? null;

        $this->exchange = $args['exchange'] ?? null;
    }
}