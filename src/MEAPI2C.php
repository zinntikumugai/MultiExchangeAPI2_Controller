<?php
namespace MEAPI2C;
class MEAPI2C {
    const MODEL = [
        "\MEAPI2C\Model\zaif",
        "\MEAPI2C\Model\ccex"
    ];

    private $loadModel = [];

    public function __construct() {
        foreach(self::MODEL as $model) {
            $keylist = explode('\\',$model);
            $key = $keylist[count($keylist)-1];
            $this->loadModel[$key] = [
                'name' => $model::NAME,
                'class' => $model
            ];
        }
    }

    public function supportList() {
        return $this->loadModel;
    }

    public function selecter($exName = ""){
        if(!array_key_exists($exName, $this->loadModel))
            return false;
        return $this->loadModel[$exName];
    }
}