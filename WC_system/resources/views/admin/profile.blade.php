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
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <div class="card-body">
                            <p class="fs-3">พนักงาน</p>
                            <div class="row align-items-center mt-3">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div><img src="{{ url('image/employee.png') }}" alt=""
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
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    ลบข้อมูล
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fs-3">ตารางแสดงการเข้างาน</p>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ลำดับ</th>
                                                        <th scope="col">วันที่</th>
                                                        <th scope="col">เวลาเข้างาน</th>
                                                        <th scope="col">หมายเหตุ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($timechecks as $timecheck)
                                                        <tr>
                                                            <th scope="row">
                                                                {{ $timechecks->firstItem() + $loop->index }}</th>
                                                            <td>{{ $timecheck->created_at->format('d-m-Y') }}</td>
                                                            <td>{{ $timecheck->created_at->format('H:i') }} น.</td>
                                                            <td class="text-danger">{{ $timecheck->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $timechecks->links() }}
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
<!--ปุ่มลบ -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">ลบข้อมูลพนักงาน</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center><img src="{{ url('image/error.png') }}" alt="" width="120px" />
                </center>
                <center>คณต้องการจะลบพนักงานคนนี้จริงๆใช่ไหม?</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <a href="{{ url('/employee/delete/' . $employee->id) }}" class="btn btn-danger">ลบพนักงาน</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/employee/update/' . $employee->id) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">เพิ่มพนักงาน</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">

                                <div class="form-group">
                                    <label>ชื่อพนักงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="name"
                                        value="{{ $employee->name }}">
                                </div>
                                <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="code"
                                        maxlength="3" value="{{ $employee->code }}">
                                </div>
                                <div class="form-group">
                                    <label>ตำแหน่งงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="position"
                                        value="{{ $employee->position }}">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input class="form-control form-control-lg" type="text" maxlength="11"
                                        name="phone"value="{{ $employee->phone }}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">อัพเดต</button>
                </div>
        </form>
    </div>
</div>
