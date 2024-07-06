<?php
// time for 24 hour
$quarter_hours = [];
for ($hour = 0; $hour <= 24; $hour += 0.25) {
    if ($hour <= 24) {
        $quarter_hours[] = $hour;
    }
}

// list year
$nowYear = date("Y");
$selectYear = [];
for ($i = 2023; $i <= $nowYear + 1; $i++) {
    $selectYear[] = $i;
}


return [
    // General
    'error_message' =>  'An error has occurred.',
    'rate_limit_request' => env('RATE_LIMIT_REQUEST', 100),
    'default_string_length' => 191,
    'default_country_id' => 1,
    'default_date_format' => 'Y/m/d',
    'default_limit' => 10,
    'response_success' => 'success',
    'activated_status' => 1,
    'verification_expire_time' => 120, // day unit
    'max_width_image_upload' => 1000,
    'password_reset_expires_in' => 1, // hour
    // Regex pattern rules
    'rule' => [
        'phone' => 'regex:/(01|02|03|04|05|06|07|08|09|[1|2|3|4|5|6|7|8|9])+([0-9]{8})\b/',
        'password' => 'regex:/(?=^.{8,16}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', // 8 - 16 characters, have at least 1 capital letter and 1 special character
        'date' => 'date_format:Y/m/d',
        'limit' => 'nullable|integer|min:-1|max:200'
    ],

    'social' => [
        'facebook' => 'facebook',
        'google' => 'google'
    ],

    'quarter_hours' => $quarter_hours,
    'select_year' => $selectYear,

    // Locale
    'locale' => [
        'jp' => 'jp',
        'vi' => 'vi'
    ],

    'keyGitLab' => env('KEY_GITLAP'),
];
