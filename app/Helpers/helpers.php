<?php


/*--------------------------------------------------------------*/
/* Function for Remove html characters
/*--------------------------------------------------------------*/
function remove_junk($str)
{
    $str = nl2br($str);
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
}

/*--------------------------------------------------------------*/
/* Function for Uppercase first character
/*--------------------------------------------------------------*/
function first_character($str)
{
    $val = str_replace('-', " ", $str);
    $val = ucfirst($val);
    return $val;
}

/*--------------------------------------------------------------*/
/* Function for find out total saleing price, buying price and profit
/*--------------------------------------------------------------*/
function total_price($totals)
{
    $sum = 0;
    $sub = 0;
    foreach ($totals as $total) {
        $sum += $total['total_saleing_price'];
        $sub += $total['total_buying_price'];
        $profit = $sum - $sub;
    }
    return array($sum, $profit);
}


/*--------------------------------------------------------------*/
/* Function for Readable date time
/*--------------------------------------------------------------*/
function read_date($str)
{
    if ($str)
        return date('d/m/Y g:i:s a', strtotime($str));
    else
        return null;
}

/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function make_date()
{
    return strftime("%Y-%m-%d %H:%M:%S", time());
}

/*--------------------------------------------------------------*/
/* Function for  Readable date time
/*--------------------------------------------------------------*/
function count_id()
{
    static $count = 1;
    return $count++;
}


/*--------------------------------------------------------------*/
/* Function for Creting random string
/*--------------------------------------------------------------*/
function randString($length = 5)
{
    $str = '';
    $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

    for ($x = 0; $x < $length; $x++)
        $str .= $cha[mt_rand(0, strlen($cha))];
    return $str;
}

function curPageURL($find)
{
    $return = false;
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, $find) !== false) {
        $return = true;
    }
    return $return;
}

function avatarInitial($name)
{
    $acronym = null;
    $word = null;
    $words = preg_split("/(\s|\-|\.)/", $name);
    foreach ($words as $w) {
        $acronym .= substr($w, 0, 1);
    }
    $word = $word . $acronym;
    return $word;
}


/**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }