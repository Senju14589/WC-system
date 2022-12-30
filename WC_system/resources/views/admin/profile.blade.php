<x-app-layout>
    <x-slot name="header">
        <div class="col">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                สวัสดีคุณ : {{ Auth::user()->name }}
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <div class="card-body">
                            <p class="fs-3">พนักงาน</p>
                            <div class="row align-items-center mt-3">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div><img src="{{ url('image/on.png') }}" alt=""
                                                        class="avatar-md rounded-circle img-thumbnail" />
                                                </div>
                                                <div class="flex-1 ms-3">
                                                    <h5 class="font-size-16 mb-1"><a href="#"
                                                            class="text-dark">{{ $employee->name }}</a>
                                                    </h5>
                                                    <span
                                                        class="badge badge-soft-success mb-0">{{ $employee->position }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-3 pt-1">
                                                <p class="text-muted mb-0"><i
                                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">Tel.</i>{{ $employee->phone }}
                                                </p>
                                                <p class="text-muted mb-0"><i
                                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">รหัสพนักงาน</i>{{ $employee->code }}
                                                </p>
                                                <p class="text-muted mb-0"><i
                                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">ตำแหน่ง</i>{{ $employee->position }}
                                                </p>
                                            </div>
                                            <div class="d-flex gap-2 pt-4">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                    แก้ไขข้อมูล
                                                </button>
                                                <a href="#" class="btn btn-danger">ลบพนักงาน</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fs-3">ตารางแสดงการเข้างาน</p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ลำดับ</th>
                                                        <th scope="col">วันที่</th>
                                                        <th scope="col">เวลาเข้างาน</th>
                                                        <th scope="col">หมายเหตุ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>30/12/2565</td>
                                                        <td>08:25</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>05/01/2566</td>
                                                        <td>08:20</td>
                                                        <td class="text-danger">WFH</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>06/01/2566</td>
                                                        <td>08:19</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('addEmployee') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เพิ่มพนักงาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">

                                <div class="form-group">
                                    <label>ชื่อพนักงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="name"
                                        placeholder="{{ $employee->name }}">
                                </div>
                                <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="code"
                                        placeholder="{{ $employee->code }}">
                                </div>
                                <div class="form-group">
                                    <label>ตำแหน่งงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="position"
                                        placeholder="{{ $employee->position }}">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input class="form-control form-control-lg" type="text"
                                        name="phone"placeholder="{{ $employee->phone }}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
        </form>
    </div>
</div>