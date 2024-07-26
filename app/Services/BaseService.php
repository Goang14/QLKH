<?php

namespace App\Services;

use App\Models\Transitions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

use Exception;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    const PAGINATE = 20;
    const PAGINATE_10 = 10;
    const PAGINATE_DEFAULT = 1;
    const DATA_MASTER = [
        'INDIRECT_TACK' => 'indirect_tasks',
        'WORK_CONTENT' => 'work_contents',
        'PLACE_WORK' => 'place_works'
    ];

    /**
     * Upload files to storage
     *
     * @param $files
     * @return array ["name" => ..., "path" => ...]
     */
    public function uploadFile($files, $newFolder=null): array
    {
        try {
            $imagePath = $files;
            $imageName = $imagePath->getClientOriginalName();
            $filename = explode('.', $imageName)[0];
            $extension = $imagePath->getClientOriginalExtension();
                $picName =  Str::slug(time()."_".$filename, "_").".". $extension;
                $folder = $newFolder ? 'uploads/'.$newFolder : 'uploads';
                $path = $files->storeAs($folder, $picName, 'public');
            return [
                "name" => $filename.".". $extension,
                "path" => $path
            ];
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Delete files to storage
     *
     * @param path files
     * @return bool
     */
    public function deleteFile($path): bool
    {
        try {
            if (Storage::exists('public/'.$path)) {
                Storage::delete('public/'.$path);
                return true;
            }
            return false;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Update
     * @param object $model
     * @param $id
     * @param array $attributes
     * @return Collection
     */
    public function updateAndFind($model, $id, $data)
    {
        $model::where('id', $id)->update($data);
        return $model::find($id);
    }

    public function exportCSV($result, $fileName, $fixedHeader){
        $file = fopen('php://temp', 'w+');
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($file, $fixedHeader);

        foreach ($result as $item) {
            fputcsv($file, $item);
        }

        rewind($file);

        $csvData = stream_get_contents($file);

        fclose($file);

        return response($csvData, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    public function transition($product_id, $repair_id, $type, $money_transition){
        try {
            $transition = Transitions::create([
                'product_id' => $product_id,
                'repair_id' => $repair_id,
                'type' => $type,
                'money_transition' => $money_transition,
            ]);
            return $transition;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
