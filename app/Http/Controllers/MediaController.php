<?php

namespace App\Http\Controllers;

use App\Models\MediaUpload;
use App\Models\Peserta;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get_media']]);
    }

    public function upload_photo(Request $request, $id_peserta): JsonResponse
    {
        $data_peserta = Peserta::where('id', $id_peserta)->get();
        if (count($data_peserta) > 0) {
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,gif,png|max:4096'
            ]);
            $file = $request->file('image');

            $filename = uniqid() . '-' . $data_peserta[0]->no_reg . '.' . $file->getClientOriginalExtension();
            $path = 'profile_picture';
            $up_data = [
                "name_file" => $filename,
                "path" => $path . '/' . $filename,
                "jenis_file" => 'images'
            ];
            $file->move(storage_path($path), $filename);
            try {
                MediaUpload::create($up_data);
                $get_id_file = MediaUpload::select('id', 'name_file')->where('name_file', $filename)->first();
                Peserta::where('id', $data_peserta[0]->id)
                    ->update([
                        'profile_picture' => $get_id_file->id
                    ]);

                $res = $this->responses(true, 'upload successfully', $up_data);
            } catch (\Throwable $th) {
                $res = $this->responses(false, 'error' . $th);
            }
        } else {
            $res = $this->responses(false, 'user tidak ditemukan');
        }
        return response()->json($res);
    }

    public function upload_audio(Request $request, $id_soal): JsonResponse
    {
        $data_soal = Soal::where('id', $id_soal)->get();
        if(count($data_soal) > 0){
            $this->validate($request,[
                'audio' => 'required|mimes:mp3,wav'
            ]);

            $audio = $request->file('audio');

            $filename = $id_soal.'.'.$audio->getClientOriginalExtension();
            $path = 'audio_soal';
            $data_up = [
                "name_file" => $filename,
                "path" => $path . '/' . $filename,
                "jenis_file" => 'audio'
            ];

            try {
                $audio->move(storage_path('audio_upload'), $filename);
                MediaUpload::create($data_up);
                $get_id_file = MediaUpload::select('id', 'name_file')->where('name_file', $filename)->first();
                Soal::where('id', $data_soal[0]->id)
                    ->update([
                        'audio' => $get_id_file->id
                    ]);

                $res = $this->responses(true, 'upload successfully', $data_up);
            } catch (\Throwable $th) {
                $res = $this->responses(false, 'error' . $th);
            }
        }else{
            $res = $this->responses(false, 'soal tidak ditemukan');
        } 

        return response()->json($res);
    }

    public function delete_media($id): JsonResponse
    {
        try {
            $data = MediaUpload::select('id', 'name_file')->where('id', $id)->first();
            unlink(storage_path('profile_picture') . '/' . $data->name_file);
            MediaUpload::where('id', $id)->delete();
            return response()->json($this->responses(true, 'media delete by id:' . $id));
        } catch (\Throwable $th) {
            return response()->json($this->responses(false, 'gagal hapus file'));
        }
    }

    public function get_media($jenis_media, $id_file)
    {
        $path = '';
        if ($jenis_media === 'images') {
            $path = 'profile_picture';
        } else if ($jenis_media === 'audio') {
            $path = 'audio';
        }
        // return response()->body($path);
        $data = MediaUpload::select('id', 'name_file')->where('id', $id_file)->first();
        $media_path = storage_path($path) . '/' . $data->name_file;
        if (file_exists($media_path)) {
            $file = file_get_contents($media_path);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }
        $res['success'] = false;
        $res['message'] = "media not found";

        return $res;
    }

    protected function responses($success, $message, $data = null)
    {
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}
