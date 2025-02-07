<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Coin;

if (!function_exists('checkMail')) {
    function checkMail($mail)
    {
        return $mail;
    }
}
if (!function_exists('getUser')) {
    function getUser($id)
    {
        $data = DB::table('users')->where('id', $id)->get()->toArray();
        return $data;
    }
}
if (!function_exists('lastMeetingLink')) {
    function lastMeetingLink()
    {
        $data = DB::table('settings')->latest('id')->limit(1);
        return ($data->count()>0)?($data->get())[0]:false;
    }
}
if (!function_exists('getRandomOds')) {
    function getRandomOds()
    {
        $home = rand(15, 100);
        $away = rand(1, $home);
        $draw = abs(100 - ($home + $away)) / 10;
        return (['home' => number_format($home / 10, 2), 'away' => number_format($away / 10, 2), 'draw' => number_format($draw, )]);

    }
}
// Function to calculate Poisson probability
if (!function_exists('poisson')) {
    function poisson($lambda, $k)
    {
        return exp(-$lambda) * pow($lambda, $k) / factorial($k);
    }
}
// Function to calculate factorial
if (!function_exists('factorial')) {
    function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }
}

if (!function_exists('getWhereNot')) {
    function getWhereNot($tb, $fld, $value)
    {
        $data = DB::table($tb)->where($fld, "!=", $value)->orderbyDesc('created_at')->get()->toArray();
        return $data;
    }
}
if (!function_exists('numberFormat')) {
    function numberFormat($amount)
    {
        return number_format((float) $amount, 2, '.', '');
    }
}
if (!function_exists('unique_code')) {
    function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}

if (!function_exists('getWhere')) {
    function getWhere($tb, $fld, $value)
    {
        $data = DB::table($tb)->where($fld, $value)->orderbyDesc('created_at')->get()->toArray();
        return $data;
    }
}
if (!function_exists('getAll')) {
    function getAll($table)
    {
        $data = DB::table($table)->orderbyDesc('created_at')->get()->toArray();
        return $data;
    }
}
if (!function_exists('insert_data')) {
    function insert_data($table, $data)
    {
        $data = DB::table($table)->insert($data);
        return $data;
    }
}
if (!function_exists('getAllOrderby')) {
    function getAllOrderby($id)
    {
        $data = DB::table($id)->orderbyDesc('created_at')->get()->toArray();
        return $data;
    }
}
if (!function_exists('countWhere')) {
    function countWhere($tb, $fld, $id)
    {
        $data = DB::table($tb)->where($fld, $id)->count();
        return $data;
    }
}
if (!function_exists('countOnly')) {
    function countOnly($tb)
    {
        $data = DB::table($tb)->count();
        return $data;
    }
}


if (!function_exists('getCodeDetails')) {
    function getCodeDetails($code)
    {
        switch ($code) {
            case '400':
                return "Something went wrong Bad Request";
                break;
            case '401':
                return "Your Access Token is Expired Try to Refresh it";
                break;
            case '401':
                return "Your Request item not found ";
                break;
            case '403':
                return "You Don't Have Permission for the request";
                break;

            default:
                return "Something went wrong";
                break;
        }
    }
}

if (!function_exists('getTimeFormat')) {
    function getTimeFormat($format, $date)
    {
        return date($format, strtotime($date));
    }
}
if (!function_exists('getDateFormat')) {
    function getDateFormat($format, $date)
    {
        return date($format, $date);
    }
}
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('findInArray')) {
    function findInArray($array, $desiredKey)
    {
        $results = [];

        foreach ($array as $key => $value) {
            if ($array[$key]['key'] === $desiredKey) {

                return $array;
            }
        }

        return $results;
    }
}


if (!function_exists('conToTimezone')) {
    function conToTimezone($dateTo, $format)
    {

        if (session()->has('timezone')) {
            $carbonDateTime = Carbon::createFromTimestamp($dateTo)->timezone(session()->get('timezone'));
            return $carbonDateTime->format($format);
        } else {
            $carbonDateTime = Carbon::createFromTimestamp($dateTo)->timezone('Asia/Jakarta');
            return $carbonDateTime->format($format);
        }

    }
}
if (!function_exists('currentTimestamps')) {

    function currentTimestamps($format)
    {
        return Carbon::now('Asia/Jakarta')->format($format);
    }
}
if (!function_exists('timeLaps')) {
    function timeLaps()
    {

        $start_time = strtotime('00:00');
        $end_time = strtotime('23:59');

        $time_array = array();

        while ($start_time <= $end_time) {
            $time_array[] = date('H:i', $start_time);
            $start_time += 30 * 60;
        }

        return ($time_array);
    }}

if (!function_exists('getSettings')) {
    function getSettings()
    {
        $data = DB::table('settings')->get();
        return $data[0];
    }}

    if (!function_exists('getFirstLastWords')) {
        function getFirstLastWords($string)
        {
            $first = substr($string, 0, 4);
            $last = substr($string, -4);
            return $first."......".$last;
        }}


if (!function_exists('gmttoutc')) {
    function gmttoutc($format, $gmtTimestamp)
    {
        $carbonDate = Carbon::parse($gmtTimestamp, 'UTC');
        return $carbonDate->format($format);
    }
}

if (!function_exists('getWeekdayCount')) {

     function getWeekdayCount($year, $month, $weekday)
    {
        $firstDayOfMonth = Carbon::create($year, $month, 1);

        $daysInMonth = $firstDayOfMonth->daysInMonth;

        $weekdayCount = 0;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            if ($firstDayOfMonth->copy()->day($day)->dayOfWeek == $weekday) {
                $weekdayCount++;
            }
        }

        return $weekdayCount;
    }


}
if (!function_exists('getTokens')) {

    function getTokens($chain,$column)
   {
    $chainData=Coin::where('chain',$chain);
    if($chainData->count()>0){
        $data= $chainData->first();
        return $data[$column];
    }
       return "null";
   }


}
if (!function_exists('getToken')) {

    function getToken()
   {
       $tokens=[
            'ethereum'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/ethereum.png',
                'dexscreener'=>'https://dexscreener.com/ethereum/',
                'dextool'=>'https://www.dextools.io/app/en/ether/pair-explorer/',
                'swap'=>'uniswap',
                'buy_button'=>'https://app.uniswap.org/#/swap?chain=ethereum&outputCurrency=',
                'swap_logo'=>"	https://dd.dexscreener.com/ds-data/dexes/uniswap.png",
            ],
            'bsc'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/bsc.png',
                'dexscreener'=>'https://dexscreener.com/bsc/',
                'dextool'=>'https://www.dextools.io/app/en/bnb/pair-explorer/',
                'swap'=>'pancakeswap',
                'buy_button'=>'https://pancakeswap.finance/swap?chainId=56&outputCurrency=',
                'swap_logo'=>"https://dd.dexscreener.com/ds-data/dexes/pancakeswap.png",
            ],
            'arbitrum'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/arbitrum.png',
                'dexscreener'=>'https://dexscreener.com/arbitrum/',
                'dextool'=>'https://www.dextools.io/app/en/arbitrum/pair-explorer/',
                'swap'=>'sushu',
                'buy_button'=>'https://www.sushi.com/swap?chainId=42161&token1=',
                'swap_logo'=>"https://dd.dexscreener.com/ds-data/dexes/sushiswap.png"
            ],
            'solana'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/solana.png',
                'dexscreener'=>'https://dexscreener.com/solana/',
                'dextool'=>'https://www.dextools.io/app/en/solana/pair-explorer/',
                'swap'=>'raydium',
                'buy_button'=>'https://raydium.io/swap/?outputCurrency=',
                'swap_logo'=>"https://dd.dexscreener.com/ds-data/dexes/raydium.png",
            ],
            'polygon'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/polygon.png',
                'dexscreener'=>'https://dexscreener.com/polygon/',
                'dextool'=>'https://www.dextools.io/app/en/polygon/pair-explorer/',
                'swap'=>'uniswap',
                'buy_button'=>'https://app.uniswap.org/#/swap?chain=polygon&outputCurrency=',
                'swap_logo'=>"	https://dd.dexscreener.com/ds-data/dexes/uniswap.png",
            ],
            'base'=>[
                'logo'=>'https://dd.dexscreener.com/ds-data/chains/base.png',
                'dexscreener'=>'https://dexscreener.com/base/',
                'dextool'=>'https://www.dextools.io/app/en/base/pair-explorer/',
                'swap'=>'uniswap',
                'buy_button'=>'https://app.uniswap.org/#/swap?chain=base&outputCurrency=ContractAddress',
                'swap_logo'=>"	https://dd.dexscreener.com/ds-data/dexes/uniswap.png",
            ],
       ];

       return $tokens;
   }


}
