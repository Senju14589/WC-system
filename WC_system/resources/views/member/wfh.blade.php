<style>
    .center {
        padding: 150px 0;
        text-align: center;

    }
</style>
<x-guest-layout>
    <div class="center">
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    กรอกรหัสพนักงาน
                </div>
                <div class="card-body">
                    <center><img src="{{ url('image/wc.png') }}"class="rounded-circle text-center" alt=""
                            width="120px"></center>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="รหัสพนักงาน">
                    </div>
                    <div class="form-group">
                        <input type="file" accept="image/*" capture="camera" />
                    </div>
                    <a href="#" class="btn btn-primary">CHECK IN</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
