<style>
    .center {
        padding: 150px 0;
        text-align: center;

    }
</style>
<x-guest-layout>
    <div class="center">
        <div class="container">
            <form action="{{ route('normal') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card text-center">
                    <div class="card-header">
                        กรอกรหัสพนักงาน
                    </div>
                    <div class="card-body">
                        <center><img src="{{ url('image/wc.png') }}"class="rounded-circle text-center" alt=""
                                width="120px"></center>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="รหัสพนักงาน" id="password"
                                name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">CHECK IN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
