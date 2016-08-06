<?php

/**
 * Prints a "pretty" version of a var. An alternative to var_dump.
 *
 * @param mixed $var
 */
function pr($var)
{
    if(App::environment() != 'production')
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

/**
 * Prints a "pretty" version of a var. An alternative to var_dump and die.
 *
 * @param $var
 */
function prx($var)
{
    if(App::environment() != 'production')
    {
        pr($var);
        exit;
    }
}

function lep($val)
{
    \Log::error(print_r($val, true));
}

function lepx($val)
{
    lep($val);
    exit;
}

/**
 * @param \Carbon\Carbon $date
 * @return null|string
 */
function getFormattedDate(\Carbon\Carbon $date = Null)
{
    try
    {
        if($date)
        {
            return $date->timezone(\Config::get('vendor-flex.local_timezone'))
                ->format(\Config::get('vendor-flex.date_time_display_information'));
        }
    }
    catch(\Exception $e){}
    return null;
}

/**
 * @param \Carbon\Carbon|null $date
 * @param string              $format
 *
 * @return null|string
 */
function getLocalDate(\Carbon\Carbon $date = Null, $format = 'Y-m-d')
{
    try
    {
        if($date)
        {
            return $date->timezone(\Config::get('vendor-flex.local_timezone'))
                ->format($format);
        }
    }
    catch(\Exception $e){}
    return null;
}

function eql()
{
    \DB::enableQueryLog();
}

function gql()
{
    lep(\DB::getQueryLog());
}

function milliseconds() {
    $mt = explode(' ', microtime());
    return $mt[1] * 1000 + round($mt[0] * 1000);
}