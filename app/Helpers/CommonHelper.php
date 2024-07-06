<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance
     *
     * @return Carbon
     */
    function carbon()
    {
        return new Carbon();
    }
}


if (! function_exists('responder')) {
    /**
     * Get custom response utility
     *
     * @return \App\Utils\ResponseUtility
     */
    function responder()
    {
        return app('responder');
    }
}


if (! function_exists('hasIncludeRequest')) {
    /**
     * Check include query param has key
     *
     * @param $key
     * @return bool|false
     */
    function hasIncludeRequest($key)
    {
        return in_array($key, explode(',', request()->get('include')), true);
    }
}

if (! function_exists('getIncludeRequest')) {
    /**
     * Get combine include request
     *
     * @param array $defaultInclude
     * @return array
     */
    function getIncludeRequest(array $defaultInclude = []): array
    {
        $queryIncludeParams = request()->has('include') ? explode(',', request()->get('include')) : [];
        return array_unique(array_merge($queryIncludeParams, $defaultInclude));
    }
}

if (! function_exists('throwIf')) {
    /**
     * @param $condition
     * @param $errorConfigKey
     * @throws Throwable
     */
    function throwIf($condition, $errorConfigKey)
    {
        throw_if($condition, new \App\Exceptions\GeneralException(is_array(config("error.$errorConfigKey")) ? config("error.$errorConfigKey") : $errorConfigKey));
    }
}

if (! function_exists('getDataFromCSV')) {
    /**
     * get data from CSV file
     * @param string $pathFile
     * @return array $listData data from CSV file
     */
    function getDataFromCSV($pathFile)
    {
        // Path to CSV file
        $csvFile = database_path($pathFile);

        // Open the CSV file to read
        $fileHandle = fopen($csvFile, "r");

        // Initialize array to store data from CSV
        $listData = [];

        $firstRow = true;

        // Read each line in the CSV file
        while (($data = fgetcsv($fileHandle)) !== FALSE) {
            // Skip the first row (contains column names)
            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            // Push this array onto $listData
            $listData[] = $data;
        }

        return $listData;

        // Close file CSV
        fclose($fileHandle);
    }
}

if (! function_exists('formatDate')) {
    function formatDate($date) {
        return $date ? $date->format('Y-m-d') : '';
    }
}
