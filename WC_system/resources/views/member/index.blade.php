<x-guest-layout>
    <div class="container mt-10" align=center>
        <div class="py-12">
            <h3 class="fs-2">ตำแหน่งปัจจุบันของคุณ</h3>
            <br>
            <div class="container">
                <div class="card">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <div class="container" Align=center>
        <div class="py-12">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-group">
                    <div class="col-sm-6 mt-3">
                        <button onclick="getLocation()" class="btn btn-primary btn-lg"> CHECK IN </button>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <a href="{{ url('/wfh') }}" class="btn btn-warning btn-lg"> WORK FOR HOME </a>
                    </div>
                </div>
                <p id="demo"></p>
            </div>
        </div>
    </div>
</x-guest-layout>

<!-- Javascript นี้เป็นวิธีการดึงที่อยู่ของผู้ใช้จากGPSของเครื่องผู้ใช้ นำมาคำนวนหาพื้นที่ในการเช็คเข้าใช้งาน ในกรณีที่ผู้ใช้อยู่นพื้นที่ที่กำหนดก็สามารถเข้าไปหน้าถัดไปได้แต่ถ้าไม่ก็แจ้งErrorกลับไป-->
<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1); // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }


    function deg2rad(deg) {
        return deg * (Math.PI / 180)
    }

    function showPosition(position) {
        // Calculate distance between user's location and designated area
        var distance = calculateDistance(position.coords.latitude, position.coords.longitude, 16.45571346138386,
            102.81952262321487);

        if (distance <= 500) {
            // Allow access to the login page
            window.location.href = '/checkin/normal';
        } else {
            // Display an error message
            x.innerHTML = "You are not in the allowed location.";
        }
    }
</script>
