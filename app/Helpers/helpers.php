<?php
/*
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use App\Models\Institute;
use App\Models\Country;
use App\Models\Teacher;
use App\Models\SchoolYear;
use App\Models\OnlineAdmission;

if (!function_exists('send_error')) {
    function send_error($message, $messages = [], $code = 404)
    {
        $response = [
            "status"  => false,
            "message" => $message,
        ];
        !empty($messages) ? $response['errors'] = $messages : null;

        return response()->json($response, $code);
    }
}
if (!function_exists('send_response')) {
    function send_response($message, $messages = [], $code = 200)
    {
        $response = [
            "status"  => true,
            "message" => $message,
        ];
        !empty($messages) ? $response['data'] = $messages : null;

        return response()->json($response, $code);
    }
}
if (!function_exists('countries')) {
    function countries()
    {
        return Country::all();
    }
}







if (! function_exists('create_money_format')) {
    function create_money_format($value)
    {
        $string = number_format((float)$value, 2, '.', ',');

        return "£ ".$string;

    }
}

if (! function_exists('create_float_format')) {
    function create_float_format($value)
    {
        $string = number_format((float)$value, 2, '.','');

        return $string;

    }
}


if (!function_exists('limit_words')) {

    function limit_words($string, $word_limit = 20)
    {
        $string = strip_tags($string);
        $words = explode(' ', strip_tags($string));
        $return = trim(implode(' ', array_slice($words, 0, $word_limit)));
        if (strlen($return) < strlen($string)) {
            $return .= '...';
        }
        return $return;
    }
}



if (! function_exists('generate_invoice')) {
    function generate_invoice($tranCode, $value, $user_id = '')
    {
        $string = $tranCode.$value.$user_id.date("m").date("y");

        return $string;

    }
}



if (! function_exists('human_words')) {
    
    function human_words($string)
    {

        $string = ucwords(str_replace('_', ' ', $string));

        return $string;
    }
}
*/

if (!function_exists('getUserTypeName')) {
    function getUserTypeName()
    {
        if(auth()->user()->user_type == 1){
            return 'Super Admin';
        }
        else if(auth()->user()->user_type == 2){
            return 'Admin';
        }
        else if(auth()->user()->user_type == 3){
            return 'User';
        }
    }
}
