@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid mb-2">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 font-weight-bold text-gray-800">Sensor Monitoring</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-primary text-uppercase mb-1">Temperature (°C)</div>
                                <div id="temperature" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class= "ri-temp-cold-line text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-success text-uppercase mb-1">
                                    Humidity (%)</div>
                                <div id="humidity" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="ri-drop-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-danger text-uppercase mb-1">
                                    Gas Status (ppm)</div>
                                <div id="gas" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="ri-fire-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-warning text-uppercase mb-1">
                                    Rain Status</div>
                                <div id="rain" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="ri-rainy-line text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 font-weight-bold text-gray-800">LED Status</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-danger text-uppercase mb-1">
                                    LED 1</div>
                                <div id="led1" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-success text-uppercase mb-1">
                                    LED 2</div>
                                <div id="led2" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-primary text-uppercase mb-1">
                                    LED 3</div>
                                <div id="led3" class="h4 mt-2 font-weight-bold text-gray-800">
                                    <!-- Data akan dimasukkan di sini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .border-left-danger {
            border-left: 0.30rem solid #e74a3b !important;
        }

        .border-left-warning {
            border-left: 0.30rem solid #f6c23e !important;
        }

        .border-left-success {
            border-left: 0.30rem solid #1cc82a !important;
        }

        .border-left-primary {
            border-left: 0.30rem solid #4e73df !important;
        }
    </style>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function getData1() {
                $.ajax({
                    url: '/data/1', // Ganti dengan URL API yang sesuai
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            const roundedItem = parseFloat(lastItem).toFixed(2);
                            html = `<p>${roundedItem}</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                const lastValue = parseFloat(data.values[lastKey]).toFixed(2);
                                html = `<p>${lastKey}: ${lastValue}</p>`;
                            }
                        }
                        $('#temperature').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#temperature').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getData2() {
                $.ajax({
                    url: '/data/2',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = `<p>${lastItem}</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                html = `<p>${lastKey}: ${data.values[lastKey]}</p>`;
                            }
                        }
                        $('#humidity').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#humidity').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getData3() {
                $.ajax({
                    url: '/data/3',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = `<p>${lastItem}</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                html = `<p>${lastKey}: ${data.values[lastKey]}</p>`;
                            }
                        }
                        $('#gas').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#gas').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getData4() {
                $.ajax({
                    url: '/data/4',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = lastItem === 1 ? `<p>Rain undetected</p>` : `<p>Rain detected</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                const lastValue = data.values[lastKey];
                                html = lastValue === 1 ? `<p>Rain detected</p>` : `<p>${lastKey}: ${lastValue}</p>`;
                            }
                        }
                        $('#rain').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#rain').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getLed1() {
                $.ajax({
                    url: '/leds/1',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = lastItem === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                const lastValue = data.values[lastKey];
                                html = lastValue === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                            }
                        }
                        $('#led1').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#led1').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getLed2() {
                $.ajax({
                    url: '/leds/2',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = lastItem === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                const lastValue = data.values[lastKey];
                                html = lastValue === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                            }
                        }
                        $('#led2').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#led2').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function getLed3() {
                $.ajax({
                    url: '/leds/3',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        if (Array.isArray(data.values) && data.values.length > 0) {
                            const lastItem = data.values[data.values.length - 1];
                            html = lastItem === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                        } else {
                            const keys = Object.keys(data.values);
                            if (keys.length > 0) {
                                const lastKey = keys[keys.length - 1];
                                const lastValue = data.values[lastKey];
                                html = lastValue === 1 ? `<p>ON</p>` : `<p>OFF</p>`;
                            }
                        }
                        $('#led3').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#led3').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            // Panggil fungsi getData secara berkala setiap 5 detik
            setInterval(function() {
                getData1();
                getData2();
                getData3();
                getData4();
                getLed1();
                getLed2();
                getLed3();
            }, 5000); // 5000 milidetik = 5 detik

            // Panggil fungsi getData saat dokumen siap
            getData1();
            getData2();
            getData3();
            getData4();
            getLed1();
            getLed2();
            getLed3();
        });
    </script>
@endpush

