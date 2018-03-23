<?php

namespace MEAPI2C\Model;

class ccex implements \MEAPI2C\Module\BaseModelInterface {
    const NAME = 'C-CEX';
    const DEFMARKET = 'dash-btc';

    //通貨の価格
    public function ticker($marketname = self::DEFMARKET){
        $data = \mpyw\Co\Co::wait(
            \MEAPI2\Model\ccex::ticker('ticker', $marketname)
        );
        $tikerData = [
            'market' => $marketname,
            'last' => $data->ticker->lastprice,
            'high' => $data->ticker->high,
            'low' => $data->ticker->low,
        ];
        $t = new \MEAPI2C\Module\Ticker($tikerData);
        return $t;
    }

    //通貨の組み合わせ
    public function currency_pairs(){
        $pairs = [];
        $datas = \mpyw\Co\Co::wait(
            \MEAPI2\Model\ccex::ticker('pairs')
        );
        var_dump($datas);
        foreach($datas->pairs as $data) {
            $pairdata = [
                'fast' => explode('-', $data)[0],
                'second' => explode('-', $data)[1],
                'symbol' => '-',
                'is_slow' => true,
                'exchange' => 'ccex'
            ];
            $pairs[] = new \MEAPI2C\Module\Pairs($pairdata);
        }
        return $pairs;
    }

    //対応通貨一覧
    public function currencys(){
        $currs = [];
        $currtmps = [];
        $datas = \mpyw\Co\Co::wait(
            \MEAPI2\Model\ccex::ticker('pairs')
        );
        foreach($datas->pairs as $data) {
            array_push($currtmps,explode('-', $data)[0],explode('-', $data)[1]);
        }
        $currtmps = array_values(array_unique($currtmps));
        foreach($currtmps as $data) {
            $currencydata = [
                'name' => $data,
                'is_token' => false //...
            ];
            $currs[] = new \MEAPI2C\Module\Currencry($currencydata);
        }
        return $currs;
    }
}