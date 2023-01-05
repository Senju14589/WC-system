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
                <div class="card-group">
                    <div class="col-sm-6 mt-3">
                        <a href="{{ url('/checkin') }}" class="btn btn-primary btn-lg"> CHECK IN </a>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <a href="{{ url('/wfh') }}" class="btn btn-warning btn-lg"> WORK FOR HOME </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
