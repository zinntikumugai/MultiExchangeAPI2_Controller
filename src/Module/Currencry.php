<?php

namespace MEAPI2C\Module;

class Currencry {
    public $name = null;
    public $is_token = null;
    public $is_money = null;

    const MONEs = [
        'JPY',
        'USD'
    ];

    public function __construct($args = []) {
        $this->name = $args['name'] ?? null;
        $this->is_token = $args['is_token'] ?? null;
        $this->is_money = self::in_money($this->name);
    }

    private function in_money($name = null) {
        if($name==null)
            return false;
        return in_array(strtoupper($name), self::MONEs);
    }
}