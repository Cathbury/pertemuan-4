<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    function index() {
        $students = Student::all();

        # jika array kosong, kirim pesan array kosong
        # jika tidak, kirim data

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    function store(Request $request) {

        # tangkap data
        # input data ke database
        # kembalikan response

        # tulis dulu dengan benar, baru dengan baik
        # berjalan dulu, baru perbaiki
        # tambahkan validasi

        $student = Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'message' => 'Student is created',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    function show($id) {

        # jika data ada, kembalikan data itu
        # jika tidak ada, kembalikan pesan data tidak ada

        #jika variable ada nilai, dan diconvert ke boolean -> true
        #jika variable tidak ada nilai, ke boolean -> false

        $student = Student::find($id);

        if($student) {
            $data = [
                'message' => "Get Detail Student",
                'data' => $student
            ];

            return response()->json($data, 200);

        } else {
            $data = [
                'message' => "Data not found"
            ];

            return response()->json($data, 200);
        }
    }

    function update(Request $request, $id)
    {
        # cari data berdasarkan id
        # update

        # bug: id tidak ada (berhasil)
        # bug: jika data tidak dikirim

        $student = Student::find($id);

        if ($student) {
            $student->update([
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ]);

            $data = [
                'message' => "Student is updated",
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => "Data not found"
            ];

            return response()->json($data, 404);
        }
    }

    function destroy($id)
    {
         # cari id
         # jika ada, hapus datanya

        $student = Student::find($id);

        if ($student) {
                $student->delete();

            $data = [
                    'message' => 'Student is deleted'
            ];

             return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Data not found'
            ];

            return response()->json($data, 404);
        }
    }
}
