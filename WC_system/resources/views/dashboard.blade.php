<x-app-layout>
    <x-slot name="header">
        <div class="col">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                สวัสดีคุณ : {{ Auth::user()->name }}
            </h2>

        </div>
    </x-slot>

    <div class="container">
        <div class="mt-6" align="center">
            <p>เพื่อความสะดวกในการรับการแจ้งเตือนการเข้างานของพนักงาน กรุณา Add Line Notify <button
                    class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">คลิ๊ก!!</button></p>

        </div>
        <div class="py-12" align="right">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    เพิ่มพนักงาน
                </button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @error('name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        @error('code')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        @error('position')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        @error('phone')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="card-body">
                        <p class="fs-3">พนักงาน</p>
                        <p>จำนวนพนักงาน : {{ count($employee) }} คน</p>
                        <div class="row align-items-center mt-3">
                            <div class="row">
                                @foreach ($employee as $row)
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div><img src="{{ url('image/employee.png') }}" alt=""
                                                            class="avatar-md rounded-circle img-thumbnail" />
                                                    </div>
                                                    <div class="flex-1 ms-3">
                                                        <h5 class="font-size-16 mb-1"><a href="#"
                                                                class="text-dark">{{ $row->name }}</a>
                                                        </h5>
                                                        <span
                                                            class="badge badge-soft-success mb-0">{{ $row->position }}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-3 pt-1">
                                                    <p class="text-muted mb-0"><i
                                                            class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">Tel.</i>{{ $row->phone }}
                                                    </p>
                                                    <p class="text-muted mb-0"><i
                                                            class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">รหัสพนักงาน</i>{{ $row->code }}
                                                    </p>
                                                    <p class="text-muted mb-0"><i
                                                            class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary">ตำแหน่ง</i>{{ $row->position }}
                                                    </p>
                                                </div>
                                                <div class="d-flex gap-2 pt-4">
                                                    <a href="{{ url('/employee/all/' . $row->id) }}"
                                                        class="btn btn-primary">ประวัติการเข้างาน</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

</x-app-layout>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Qr Code Line Notify</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center><img src="{{ url('image/lineNotify.jpg') }}" alt="" width="300px" />
                </center>
                <center>เพื่อความสะดวกในการรับการแจ้งเตือนการเข้างานของพนักงาน กรุณา Add Line Notify </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

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
                                        placeholder="ระบุชื่อจริงพนักงาน">
                                </div>
                                <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="code"
                                        maxlength="3" placeholder="ระบุรหัสพนักงาน">
                                </div>
                                <div class="form-group">
                                    <label>ตำแหน่งงาน</label>
                                    <input class="form-control form-control-lg" type="text" name="position"
                                        placeholder="ระบุตำแหน่งงาน">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input class="form-control form-control-lg" type="text" name="phone"
                                        maxlength="11" placeholder="ระบุเบอร์ติดต่อ">
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
</div>
