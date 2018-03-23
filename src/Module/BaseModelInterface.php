<?php

namespace MEAPI2C\Module;

interface BaseModelInterface {
    //通貨の価格
    public function ticker($marketname);
    //通貨の組み合わせ
    public function currency_pairs();
    //対応通貨一覧
    public function currencys();
}