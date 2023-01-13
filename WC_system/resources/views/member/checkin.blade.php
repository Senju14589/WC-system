<style>
    .center {
        padding: 150px 0;
        text-align: center;

    }
</style>
<x-guest-layout>
    <div class="center">
        <div class="container">
            <form action="{{ route('normal') }}" method="post" enctype="multipart/form-data" onsubmit="getLocation();">
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
                            <input type="hidden" name="lat" id="lat" value="">
                            <input type="hidden" name="lon" id="lon" value="">
                            <input type="hidden" name="status" id="status" value="ปกติ">
                            <input type="text" class="form-control" placeholder="รหัสพนักงาน" id="password"
                                name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">เข้างาน</button>
                    </div>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</x-guest-layout>

<script>
    window.onload = function() {
        getLocation();
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.querySelector("#lat").value = position.coords.latitude;
        document.querySelector("#lon").value = position.coords.longitude;
    }
</script>
