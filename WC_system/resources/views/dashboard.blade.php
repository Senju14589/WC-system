<x-app-layout>
    <x-slot name="header">
        <div class="col">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                สวัสดีคุณ : {{ Auth::user()->name }}
                <p>จำนวนพนักงาน :</p>
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="py-12" align="right">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <button type="button" class="btn btn-success">เพิ่มพนักงาน</button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="card-body">
                        <p class="fs-3">พนักงาน</p>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#"><i data-feather="user" class="sm"></a></th>
                                    <td>นายพุฒิพงศ์ สักแสน</td>
                                    <td><a href="#"><i data-feather="chevron-right" class="sm"></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><i data-feather="user" class="sm"></a></th>
                                    <td>นายเซ็นจู ฮาชิรามะ</td>
                                    <td><a href="#"><i data-feather="chevron-right" class="sm"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
