<?php

namespace App\Http\Controllers;

use App\Models\JenisSoal;
use App\Models\MediaUpload;
use App\Models\Soal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth:api', 
            [
                'except' => [
                    'get_soal'
                ]
            ]
        );
    }

    public function get_soal($jenis): JsonResponse
    {
        $soal = Soal::select("soal.*", "test.jenis_test", "jenis_soal.type_soal")
            ->join("test", "soal.type_test", "=", "test.id")
            ->join("jenis_soal", "soal.type_soal", "=", "jenis_soal.id")
            ->where("type_test", $jenis)
            ->orderBy('index', 'asc')
            ->get();
        $data = [];

        for ($i = 0; $i < count($soal); $i++) {
            $data[] = $this->result_soal($soal[$i]);
        }

        if (count($soal) > 0) {
            $res = $this->responses(true, 'mengambil jumlah '.count($data).' semua soal: ' . $jenis, $data);
        } else {
            $res = $this->responses(false, 'soal tidak ditemukan');
        }
        return response()->json($res);
    }

    public function detail_soal($id): JsonResponse
    {
        $detail_soal = Soal::where("soal.id", $id)
            ->join("test", "soal.type_test", "=", "test.id")
            ->join("jenis_soal", "soal.type_soal", "=", "jenis_soal.id")
            ->select("soal.*", "test.jenis_test", "jenis_soal.type_soal")
            ->get();
        $result = $this->result_soal($detail_soal[0]);
        if (count($detail_soal) > 0) {
            $res = $this->responses(true, 'get detail soal id:' . $id, $result);
        } else {
            $res = $this->responses(false, 'soal tidak ditemukan');
        }
        return response()->json($res);
    }

    public function create(Request $request): JsonResponse
    {
        $jenis_soal = $request->input("type_soal");
        $data_jenis_soal = JenisSoal::select('type_soal')->where('id', $jenis_soal)->first()->type_soal;
        $val_index = $this->get_index($request->input('type_test'));
        $data = [
            "index" => $val_index,
            "type_test" => $request->input('type_test'),
            "type_soal" => $request->input('type_soal'),
            "test" => $request->input('test'),
            "page_title" => $request->input('page_title'),
            "page_subtitle" => $request->input('page_subtitle'),
            "title" => $request->input('title'),
            "subtitle" => $request->input('subtitle'),
            "timer" => $request->input('timer')
        ];
        $result_data = [];

        if ($data_jenis_soal === "blank" || $data_jenis_soal == "question") {
            $result_data = $data;
        } else if ($data_jenis_soal === "card") {
            $content = [
                "content" => $request->input('content')
            ];
            $result_data = $data + $content;
        } else if ($data_jenis_soal === "example" || $data_jenis_soal === "test" || $data_jenis_soal === "test1") {
            $content = [
                "no" => $request->input('no'),
                "a" => $request->input('a'),
                "b" => $request->input('b'),
                "c" => $request->input('c'),
                "d" => $request->input('d'),
                "key" => $request->input('key')
            ];
            $result_data = $data + $content;
        } else if ($data_jenis_soal === "paragraph") {
            $content = [
                "paragraph_title" => $request->input('p_title'),
                "paragraph" => $request->input('paragraph'),
                "a" => $request->input('a'),
                "b" => $request->input('b'),
                "c" => $request->input('c'),
                "d" => $request->input('d'),
                "key" => $request->input("key")
            ];
            $result_data = $data + $content;
        }

        try {
            Soal::create($result_data);
            return response()->json($this->responses(true, 'berhasil menambahkan soal'));
        } catch (\Throwable $th) {
            return response()->json($this->responses(false, 'gagal menambahkan soal'));
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $soal = Soal::where('id', $id)->first();
        if ($soal != null) {
            $jenis_soal = $request->input("type_soal");
            $data_jenis_soal = JenisSoal::select('type_soal')->where('id', $jenis_soal)->first()->type_soal;
            // return response()->json($data_jenis_soal);
            $data = [
                "index"         => $request->input('index'),
                "type_test"     => $request->input('type_test'),
                "type_soal"     => $request->input('type_soal'),
                "test"          => $request->input('test'),
                "page_title"    => $request->input('page_title'),
                "page_subtitle" => $request->input('page_subtitle'),
                "title"         => $request->input('title'),
                "subtitle"      => $request->input('subtitle'),
                "timer"         => $request->input('timer')
            ];
            $result_data = [];

            if ($data_jenis_soal === "blank" || $data_jenis_soal == "question") {
                $result_data = $data;
            } else if ($data_jenis_soal === "card") {
                $content = [
                    "content" => $request->input('content')
                ];
            } else if ($data_jenis_soal == "example" || $data_jenis_soal == "test" || $data_jenis_soal == "test1") {
                $content = [
                    "no" => $request->input('no'),
                    "a" => $request->input('a'),
                    "b" => $request->input('b'),
                    "c" => $request->input('c'),
                    "d" => $request->input('d'),
                    "key" => $request->input('key')
                ];
                $result_data = $data + $content;
            } else if ($data_jenis_soal === "paragraph") {
                $content = [
                    "paragraph_title" => $request->input('p_title'),
                    "paragraph" => $request->input('paragraph'),
                    "a" => $request->input('a'),
                    "b" => $request->input('b'),
                    "c" => $request->input('c'),
                    "d" => $request->input('d'),
                    "key" => $request->input("key")
                ];
                $result_data = $data + $content;
            }
            try {
                Soal::where('id', $id)->update($result_data);
                return response()->json($this->responses(true, 'berhasil update soal'));
            } catch (\Throwable $th) {
                return response()->json($this->responses(false, 'gagal update soal'));
            }
        } else {
            return response()->json($this->responses(false, 'data tidak ditemukan'));
        }
    }

    public function delete($id): JsonResponse
    {
        $soal = Soal::where('id', $id)->get();
        if (count($soal) > 0) {
            try {
                Soal::where('id', $id)->delete();
                return response()->json($this->responses(true, 'berhasil hapus data id:' . $id));
            } catch (\Throwable $th) {
                return response()->json($this->responses(false, 'gagal hapus data id:' . $id, $th));
            }
        } else {
            return response()->json($this->responses(false, 'tidak ditemukan id:' . $id));
        }
    }

    protected function responses($success, $message, $data = null)
    {
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }

    protected function result_soal($data)
    {
        $result = [
            "id" => $data->id,
            "index" => $data->index,
            "type_test" => $data->jenis_test,
            "type_soal" => $data->type_soal,
            "test" => $data->test,
            "page" => [
                "title" => $data->page_title,
                "subtitle" => $data->page_subtitle,
            ],
            "timer" => $data->timer,
            "title" => [
                "title" => $data->title,
                "subtitle" => $data->subtitle,
            ],
            "created_at" => $data->created_at,
            "updated_at" => $data->updated_at
        ];

        $content = [];
        $audio = [];

        if($data->audio != null){
            $data_audio = MediaUpload::select('id', 'name_file', 'path')
                            ->where('id', $data->audio)
                            ->first();
            $audio = [
                "audio" => [
                    "name_audio" => $data_audio->name_file,
                    "path" => $data_audio->path,
                    "url" => url('media/audio/'.$data_audio->id)
                ],
            ];
        }else{
            $audio = [
                "audio" => null,
            ];
        }

        if ($data->type_soal == 'example' || $data->type_soal == 'test' || $data->type_soal == 'test1') {
            $content = [
                "no" => $data->no,
                "a" => $data->a,
                "b" => $data->b,
                "c" => $data->c,
                "d" => $data->d,
                "key" => $data->key
            ];
        } else if ($data->type_soal == 'card') {
            $content = [
                "content" => $data->content
            ];
        } else if ($data->type_soal == 'paragraph') {
            $content = [
                "paragraph_title" => $data->paragraph_title,
                "paragraph" => $data->paragraph,
                "a" => $data->a,
                "b" => $data->b,
                "c" => $data->c,
                "d" => $data->d,
                "key" => $data->key
            ];
        }
        return $result + $audio + $content;
    }

    protected function get_index($type_test)
    {
        $data = DB::table('soal')
            ->where('type_test', $type_test)
            ->max('index');
        if ($data == null) {
            $data = 0;
        }
        return $data + 1;
    }
}
