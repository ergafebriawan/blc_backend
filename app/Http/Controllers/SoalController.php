<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function get_soal($jenis): JsonResponse
    {
        $soal = Soal::where("jenis_test", $jenis)->get();
        if (count($soal) > 0) {
            $res = $this->responses(true, 'mengambil data semua soal: ' . $jenis, $soal);
        } else {
            $res = $this->responses(false, 'soal tidak ditemukan');
        }
        return response()->json($res);
    }

    public function detail_soal($id): JsonResponse
    {
        $detail_soal = Soal::where("_id", $id)->get();
        if (count($detail_soal) > 0) {
            $res = $this->responses(true, 'get detail soal id:' . $id, $detail_soal[0]);
        } else {
            $res = $this->responses(false, 'soal tidak ditemukan');
        }
        return response()->json($res);
    }

    public function create(Request $request): JsonResponse
    {
        $type_test = $request->input("type");
        $content = [];
        if ($type_test === "blank" || $type_test == "question") {
            $content = null;
        } else if ($type_test === "card") {
            $content = $request->input("content");
        } else if ($type_test == "example" ||$type_test == "test" || $type_test == "test1") {
            $content = [
                "no" => $request->input("no"),
                "a" => $request->input("a"),
                "b" => $request->input("b"),
                "c" => $request->input("c"),
                "d" => $request->input("d"),
                "key" => $request->input("key")
            ];
        } else if ($type_test === "paragraph") {
            $content = [
                "paragraph-title" => $request->input("p-title"),
                "paragraph" => $request->input("paragraph"),
                "a" => $request->input("a"),
                "b" => $request->input("b"),
                "c" => $request->input("c"),
                "d" => $request->input("d"),
                "key" => $request->input("key")
            ];
        }
        $data = [
            "jenis_test" => $request->input('jenis_test'),
            "type" => $request->input('type'),
            "test" => $request->input('test'),
            "page" => [
                "page-title" => $request->input('page-title'),
                "page-subtitle" => $request->input('page-subtitle')
            ],
            "title" => [
                "title" => $request->input('title'),
                "subtitle" => $request->input('subtitle')
            ],
            "content" => $content,
            "timer" => $request->input('timer'),
            "audio" => $request->input('audio'),
            "created_at" => date("Y-m-d H:i:s", time()),
            "updated_at" => date("Y-m-d H:i:s", time())
        ];
        try {
            Soal::create($data);
            return response()->json($this->responses(true, 'berhasil menambahkan soal'));
        } catch (\Throwable $th) {
            return response()->json($this->responses(false, 'gagal menambahkan soal'));
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $soal = Soal::where('_id', $id)->get();
        if (count($soal) > 0) {
            $type_test = $request->input("type");
            $content = [];
            if ($type_test === "blank" || $type_test == "question") {
                $content = null;
            } else if ($type_test === "card") {
                $content = $request->input("content");
            } else if ($type_test == "example" ||$type_test == "test" || $type_test == "test1") {
                $content = [
                    "no" => $request->input("no"),
                    "a" => $request->input("a"),
                    "b" => $request->input("b"),
                    "c" => $request->input("c"),
                    "d" => $request->input("d"),
                    "key" => $request->input("key")
                ];
            } else if ($type_test === "paragraph") {
                $content = [
                    "paragraph-title" => $request->input("p-title"),
                    "paragraph" => $request->input("paragraph"),
                    "a" => $request->input("a"),
                    "b" => $request->input("b"),
                    "c" => $request->input("c"),
                    "d" => $request->input("d"),
                    "key" => $request->input("key")
                ];
            }
            $data = [
                "jenis_test" => $request->input('jenis_test'),
                "type" => $request->input('type'),
                "test" => $request->input('test'),
                "page" => [
                    "page-title" => $request->input('page-title'),
                    "page-subtitle" => $request->input('page-subtitle')
                ],
                "title" => [
                    "title" => $request->input('title'),
                    "subtitle" => $request->input('subtitle')
                ],
                "content" => $content,
                "timer" => $request->input('timer'),
                "audio" => $request->input('audio'),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time())
            ];
            try {
                Soal::where('_id', $id)->update($data);
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
        try {
            Soal::where('_id', $id)->delete();
            return response()->json($this->responses(true, 'berhasil hadpus data id:' . $id));
        } catch (\Throwable $th) {
            return response()->json($this->responses(false, 'gagal hapus data id:' . $id, $th));
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
}
