<?php
require_once ('coinapi.inc.php');

// define constants for testing
$api_key = "YOUR_API_KEY_HERE"; // insert here you api key
$asset_id_base = 'BTC';
$asset_id_quote = 'USD';
$symbol_id = 'BITSTAMP_SPOT_BTC_USD';
$period_id = '1HRS';
$time_start = (new DateTime())->modify('-7 days');
$time_end = (new DateTime())->modify('-5 days');
$limit = 200;

// allocate class
$capi = new CoinAPI($api_key);
// get list of exchanges
print_r($capi->GetExchanges());
// get list of assets
print_r($capi->GetAssets());
// get list of symbols
print_r($capi->GetSymbols());
// get current exchange rate
print_r($capi->GetExchangeRate($asset_id_base, $asset_id_quote));
// get all current exchange rates for asset
print_r($capi->GetExchangeRates($asset_id_base));
// get ohlcv periods
print_r($capi->GetPeriods());
// get latest ohlcv data for specific symbol and period
print_r($capi->GetOHLCVLatest($symbol_id, $period_id, $limit));
// get history ohlcv data for specific symbol, period and time range
print_r($capi->GetOHLCVHistory($symbol_id, $period_id, $time_start, $time_end, $limit));
// get latest trades across all symbols
print_r($capi->GetTradesLatest(null, $limit));
// get latest trades from specific symbol
print_r($capi->GetTradesLatest($symbol_id, $limit));
// get history trades from specific symbol and time range
print_r($capi->GetTradesHistory($symbol_id, $time_start, $time_end, $limit));
// get current quotes across all symbols
print_r($capi->GetQuotesCurrent());
// get current quote for specific symbol
print_r($capi->GetQuotesCurrent($symbol_id));
// get latest quotes across all symbols
print_r($capi->GetQuotesLatest(null, $limit));
// get latest quotes from specific symbol
print_r($capi->GetQuotesLatest($symbol_id, $limit));
// get history quotes from specific symbol and time range
print_r($capi->GetQuotesHistory($symbol_id, $time_start, $time_end, $limit));
// get current Orderbooks across all symbols
print_r($capi->GetOrderbookCurrent());
// get current Orderbook from specific symbol
print_r($capi->GetOrderbookCurrent($symbol_id));
// get latest Orderbooks from spefific symbol
print_r($capi->GetOrderbookLatest($symbol_id, $limit));
// get history Orderbooks from specific symbol and time range
print_r($capi->GetOrderbookHistory($symbol_id, $time_start, $time_end, $limit));
// get latest twitter data
print_r($capi->GetTwitterLatest($limit));
// get history twitter data from specific time range
print_r($capi->GetTwitterHistory($time_start, $time_end, $limit));
?>
