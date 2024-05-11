<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get_soal($jenis): JsonResponse
    {
        $soal = Soal::select()
            ->where("type_test", $jenis)
            ->join("test", "soal.type_test", "=", "test.id")
            ->join("jenis_soal", "soal.type_soal", "=", "jenis_soal.id")
            ->select("soal.*", "test.jenis_test", "jenis_soal.type_soal")
            ->orderBy('index', 'asc')
            ->get();
        $data = [];

        for ($i = 0; $i < count($soal); $i++) {
            $data[] = $this->result_soal($soal[$i]);
        }

        if (count($soal) > 0) {
            $res = $this->responses(true, 'mengambil data semua soal: ' . $jenis, $data);
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
        $data_jenis_soal = DB::table('jenis_soal')->select('type_soal')->where('id', $jenis_soal)->first();
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

        if ($data_jenis_soal->type_soal === "blank" || $data_jenis_soal->type_soal == "question") {
            $result_data = $data;
        } else if ($data_jenis_soal->type_soal === "card") {
            $content = [
                "content" => $request->input('content')
            ];
            $result_data = $data + $content;
        } else if ($data_jenis_soal->type_soal === "example" || $data_jenis_soal->type_soal === "test" || $data_jenis_soal->type_soal === "test1") {
            $content = [
                "no" => $request->input('no'),
                "a" => $request->input('a'),
                "b" => $request->input('b'),
                "c" => $request->input('c'),
                "d" => $request->input('d'),
                "key" => $request->input('key')
            ];
            $result_data = $data + $content;
        } else if ($data_jenis_soal->type_soal === "paragraph") {
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
        $soal = Soal::where('id', $id)->get();
        if (count($soal) > 0) {
            $jenis_soal = $request->input("type");
            $data_jenis_soal = DB::table('jenis_soal')->select('type_soal')->where('id', $jenis_soal)->first();
            $data = [];

            if ($data_jenis_soal === "blank" || $data_jenis_soal == "question") {
                $data = [
                    "jenis_test" => $request->input('jenis_test'),
                    "type" => $request->input('type'),
                    "test" => $request->input('test'),
                    "page-title" => $request->input('page-title'),
                    "page-subtitle" => $request->input('page-subtitle'),
                    "title" => $request->input('title'),
                    "subtitle" => $request->input('subtitle'),
                    "timer" => $request->input('timer')
                ];
            } else if ($data_jenis_soal === "card") {
                $data = [
                    "jenis_test" => $request->input('jenis_test'),
                    "type" => $request->input('type'),
                    "test" => $request->input('test'),
                    "page-title" => $request->input('page-title'),
                    "page-subtitle" => $request->input('page-subtitle'),
                    "title" => $request->input('title'),
                    "subtitle" => $request->input('subtitle'),
                    "content" => $request->input('content'),
                    "timer" => $request->input('timer')
                ];
            } else if ($data_jenis_soal == "example" || $data_jenis_soal == "test" || $data_jenis_soal == "test1") {
                $data = [
                    "jenis_test" => $request->input('jenis_test'),
                    "type" => $request->input('type'),
                    "test" => $request->input('test'),
                    "page_title" => $request->input('page-title'),
                    "page_subtitle" => $request->input('page-subtitle'),
                    "title" => $request->input('title'),
                    "subtitle" => $request->input('subtitle'),
                    "no" => $request->input('no'),
                    "a" => $request->input('a'),
                    "b" => $request->input('b'),
                    "c" => $request->input('c'),
                    "d" => $request->input('d'),
                    "key" => $request->input('key'),
                    "timer" => $request->input('timer')
                ];
            } else if ($data_jenis_soal === "paragraph") {
                $data = [
                    "jenis_test" => $request->input('jenis_test'),
                    "type" => $request->input('type'),
                    "test" => $request->input('test'),
                    "page-title" => $request->input('page-title'),
                    "page-subtitle" => $request->input('page-subtitle'),
                    "title" => $request->input('title'),
                    "subtitle" => $request->input('subtitle'),
                    "paragraph-title" => $request->input('p-title'),
                    "paragraph" => $request->input('paragraph'),
                    "a" => $request->input('a'),
                    "b" => $request->input('b'),
                    "c" => $request->input('c'),
                    "d" => $request->input('d'),
                    "key" => $request->input("key"),
                    "timer" => $request->input('timer')
                ];
            }
            try {
                Soal::where('id', $id)->update($data);
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

    public function upload_audio(Request $request, $id)
    {
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
            "title" => [
                "title" => $data->title,
                "subtitle" => $data->subtitle,
            ],
            "timer" => $data->timer,
            "audio" => [
                "name_audio" => "example.mp3",
                "path" => "path/info"
            ],
            "created_at" => $data->created_at,
            "updated_at" => $data->updated_at
        ];

        $content = [];

        if ($data->type_soal == 'example' || $data->type_soal == 'test' || $data->type_soal == 'test1') {
            $content = [
                "content" => [
                    "no" => $data->no,
                    "a" => $data->a,
                    "b" => $data->b,
                    "c" => $data->c,
                    "d" => $data->d,
                    "key" => $data->key,
                ],
            ];
        } else if ($data->type_soal == 'card') {
            $content = [
                "content" => $data->content
            ];
        } else if ($data->type_soal == 'paragraph') {
            $content = [
                "paragraph-title" => $data->paragraph_title,
                "paragraph" => $data->paragraph,
                "a" => $data->a,
                "b" => $data->b,
                "c" => $data->c,
                "d" => $data->d,
                "key" => $data->key
            ];
        }
        return $result + $content;
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
