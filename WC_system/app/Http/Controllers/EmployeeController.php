<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'name' => 'required|unique:employees|max:255'
            ],
            [
                'name.required' => "กรุณาป้อนชื่อพนักงานด้วยครับ",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'name.unique' => "มีชื่อพนักงานคนนี้ในฐานข้อมูลแล้ว"
            ]
        );
        //บันทึกข้อมูลแบบ Query Builder
        $data = array();
        $data["name"] = $request->name;
        $data["code"] = $request->code;
        $data["position"] = $request->position;
        $data["phone"] = $request->phone;
        //Query Builder
        DB::table("employees")->insert($data);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }
}