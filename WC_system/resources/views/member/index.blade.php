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
                        <button onclick="getLocation()" class="btn btn-primary btn-lg"> NORMAL </button>
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
    function getLocation() {
        console.log('getLocation called');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat1 = position.coords.latitude;
                var lon1 = position.coords.longitude;
                var lat2 = 16.455719331499942;
                var lon2 = 102.81952843819222;
                var distance = calculateDistance(lat1, lon1, lat2, lon2);

                function calculateDistance(lat1, lon1, lat2, lon2) {
                    var R = 6371; // Radius of the earth in km
                    function deg2rad(deg) {
                        return deg * (Math.PI / 180)
                    }
                    var dLat = deg2rad(lat2 - lat1); // deg2rad below
                    var dLon = deg2rad(lon2 - lon1);
                    var a =
                        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                        Math.sin(dLon / 2) * Math.sin(dLon / 2);
                    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                    var d = R * c; // Distance in km
                    return d * 1000;
                }
                if (distance <= 40) {
                    // The user is within 500 meters of the designated location
                    // Do something (such as redirecting the user to a different page)
                    window.location.href = '/checkin';
                } else {
                    // The user is not within 500 meters of the designated location
                    // Do something else (such as displaying an error message)
                    x.innerHTML = "คุณอยู่นอกพื้นที่ที่ทำงาน ไม่สามารถเข้าCheck IN ได้ ";
                }
            });
        } else {
            console.log('navigator.geolocation not supported');
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    var x = document.getElementById("demo");
</script>
