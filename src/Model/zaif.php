<?php

namespace MEAPI2C\Model;

class zaif implements \MEAPI2C\Module\BaseModelInterface {
    const NAME = 'Zaif';
    const DEFMARKET = 'btc_jpy';

    //通貨の価格
    public function ticker($marketname = self::DEFMARKET) {
        $data = \mpyw\Co\Co::wait(
            \MEAPI2\Model\zaif::sw('ticker', $marketname)
        );
        $tikerData = [
            'market' => $marketname,
            'last' => $data->last,
            'high' => $data->high,
            'low' => $data->low,
        ];
        $t = new \MEAPI2C\Module\Ticker($tikerData);
        return $t;
    }
    //通貨の組み合わせ
    public function currency_pairs(){
        $pairs = [];
        $datas = \mpyw\Co\Co::wait(
            \MEAPI2\Model\zaif::pair('all')
        );
        foreach($datas as $data)  {
            $pairdata =  [
                'fast' => explode('_', $data->currency_pair)[0],
                'second' => explode('_', $data->currency_pair)[1],
                'symbol' => '_',
                'is_slow' => true,
                'exchange' => 'zaif'
            ];
            $pairs[] = new \MEAPI2C\Module\Pairs($pairdata);
        }
        return $pairs;
    }
    //対応通貨一覧
    public function currencys(){
        $currs = [];
        $datas = \mpyw\Co\Co::wait(
            \MEAPI2\Model\zaif::curr('all')
        );
        foreach($datas as $data) {
            $currencydata = [
                'name' => $data->name,
                'is_token' => $data->is_token
            ];
            $currs[] = new \MEAPI2C\Module\Currencry($currencydata);
        }
        return $currs;
    }
}