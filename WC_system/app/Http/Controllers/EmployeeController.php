<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Geocoder\Geocoder;

class EmployeeController extends Controller
{
    public function index($id)
    {
        $employee = employee::where('id', $id)->first();
        return view('admin.profile', compact('employee'));
    }

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'name' => 'required|unique:employees|max:255',
                'code' => 'required|unique:employees',
                'position' => 'required',
                'phone' => 'required|unique:employees',
            ],
            [
                'name.required' => "กรุณาป้อนชื่อของพนักงานด้วยครับ",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'name.unique' => "มีชื่อของพนักงานคนนี้ในฐานข้อมูลแล้ว",
                'code.required' => "กรุณาป้อนรหัสของพนักงานด้วยครับ",
                'code.unique' => "มีรหัสของพนักงานคนนี้ในฐานข้อมูลแล้ว",
                'position.required' => "กรุณาป้อนตำแหน่งของพนักงานด้วยครับ",
                'phone.required' => "กรุณาป้อนเบอร์โทรศัพท์ของพนักงานด้วยครับ"
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

    public function update(Request $request, $id)
    {
        $post = employee::findOrFail($id);
        $post->update($request->only(['name', 'code', 'position', 'phone']));

        return redirect()->back()->with('success', "อัพเดตเรียบร้อย");
    }

    public function delete($id)
    {
        $post = employee::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard')->with('success', "ลบข้อมูลถาวรเรียบร้อย");
    }

    public function check_login(Request $request)
    {
        $geocoder = new Geocoder();
        $ip = $request->ip();
        $location = $geocoder->geocode($ip)->first();

        $minLat = 16.45571346138386;
        $maxLat = 16.45584241403521;
        $minLng = 102.81952262321487;
        $maxLng = 102.81971500489436;

        if (
            $location->getLatitude() > $minLat && $location->getLatitude() < $maxLat &&
            $location->getLongitude() > $minLng && $location->getLongitude() < $maxLng
        ) {
            // Allow access to the login page
            return view('member.checkin');
        } else {
            // Display an error message
            return response('You are not in the allowed location.', 403);
        }
    }
}