<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Timecheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index($id)
    {
        $employee = Employee::with('timechecks')->find($id);
        $timechecks = $employee->timechecks()->latest()->paginate(5);
        return view('admin.profile', compact('employee', 'timechecks'));
    }


    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'name' => 'required|max:255',
                'code' => 'required|unique:employees',
                'position' => 'required',
            ],
            [
                'name.required' => "กรุณาป้อนชื่อของพนักงานด้วยครับ",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'code.required' => "กรุณาป้อนรหัสของพนักงานด้วยครับ",
                'code.unique' => "มีรหัสของพนักงานคนนี้ในฐานข้อมูลแล้ว",
                'position.required' => "กรุณาป้อนตำแหน่งของพนักงานด้วยครับ"
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
        return redirect()->route('dashboard')->with('error', "ลบข้อมูลถาวรเรียบร้อย");
    }

    public function check_login(Request $request)
    {
        $employeedata = Employee::where('code', $request->password)->first();
        if ($employeedata) {
            $timecheck = new Timecheck();
            $timecheck->employee_id = $employeedata->id;
            $timecheck->location = $request->lat . ', ' . $request->lon;
            $timecheck->status = $request->status;
            $created_at = Carbon::now();
            if ($created_at->format('H:i:s') < "08:30:00") {
                $timecheck->note = "เข้าตรงเวลา";
            } else {
                $timecheck->note = "มาสาย";
            }
            $timecheck->save();
            // retrieve employee name
            $employeeName = $timecheck->employee->name;
            $created_at = $timecheck->created_at->format('H:i');
            $status = $timecheck->status;
            $date = $timecheck->created_at->format('d-m-Y');
            $note = $timecheck->note;

            // Send notification to Line Notify
            $client = new Client();
            $response = $client->post('https://notify-api.line.me/api/notify', [
                'headers' => [
                    'Authorization' => 'Bearer fc1G0ffXrV6FYHXmIsIGCj6BAtz9RNW5xaAPCVwhxNM',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'message' => "\nวันที่ : " . $date . "\nชื่อพนักงาน : " . $employeeName . "\nเวลาเข้างาน: " . $created_at . 'น.' . "\nเข้างานแบบ: " .
                        $status . "\nหมายเหตุ: " . $note,
                ],
            ]);
            return redirect()->back()->with('success', "บันทึกเข้างาน เรียบร้อยแล้ว.");
        } else {
            return redirect()->back()->with('error', "ไม่พบพนักงานในระบบ กรุณาตรวจสอบรหัสพนักงาน.");
        }
    }
}