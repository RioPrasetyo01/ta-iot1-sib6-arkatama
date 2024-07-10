@extends('layouts.dashboard')

@section('content')
    <div class="mb-2" id="temperature"></div>
    <button id="showTemperatureData" class="btn btn-primary mb-2">Temperature Data</button>
    <div id="temperatureTableContainer" style="display:none;">
        <table class="table table-bordered" id="temperatureTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Temperature</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be appended here -->
            </tbody>
        </table>
        <nav>
            <ul class="pagination" id="temperaturePagination">
                <!-- Pagination buttons will be appended here -->
            </ul>
        </nav>
    </div>
    <div class="mb-2" id="humidity"></div>
    <button id="showHumidityData" class="btn btn-primary mb-2">Humidity Data</button>
    <div id="humidityTableContainer" style="display:none;">
        <table class="table table-bordered" id="humidityTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Humidity</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be appended here -->
            </tbody>
        </table>
        <nav>
            <ul class="pagination" id="humidityPagination">
                <!-- Pagination buttons will be appended here -->
            </ul>
        </nav>
    </div>
    <div class="mb-2" id="gas"></div>
    <button id="showGasData" class="btn btn-primary mb-2">Gas Data</button>
    <div id="gasTableContainer" style="display:none;">
        <table class="table table-bordered" id="gasTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Gas</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be appended here -->
            </tbody>
        </table>
        <nav>
            <ul class="pagination" id="gasPagination">
                <!-- Pagination buttons will be appended here -->
            </ul>
        </nav>
    </div>
    <div class="mb-2" id="rain"></div>
    <button id="showRainData" class="btn btn-primary mb-2">Rain Data</button>
    <div id="rainTableContainer" style="display:none;">
        <table class="table table-bordered" id="rainTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Rain Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be appended here -->
            </tbody>
        </table>
        <nav>
            <ul class="pagination" id="rainPagination">
                <!-- Pagination buttons will be appended here -->
            </ul>
        </nav>
    </div>
@endsection

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemsPerPage = 10; // Number of items per page
        const updateInterval = 3000; // Interval to update the charts (in milliseconds, e.g., 30000 ms = 30 seconds)
        let temperatureData = null;
        let humidityData = null;
        let gasData = null;
        let rainData = null;

        function loadChart(chartId, url, dataVariable, title, seriesName) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    dataVariable.categories = data.categories.slice().reverse(); // Reverse the categories
                    dataVariable.values = data.values.slice().reverse(); // Reverse the values

                    // Limit data to 20 points
                    const categories = dataVariable.categories.slice(0, 20).reverse();
                    const values = dataVariable.values.slice(0, 20).reverse();

                    Highcharts.chart(chartId, {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: title
                        },
                        xAxis: {
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value'
                            }
                        },
                        series: [{
                            name: seriesName,
                            data: values
                        }]
                    });
                }
            });
        }

        function updateChart(chartId, url, dataVariable) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    dataVariable.categories = data.categories.slice().reverse(); // Reverse the categories
                    dataVariable.values = data.values.slice().reverse(); // Reverse the values

                    // Limit data to 20 points
                    const categories = dataVariable.categories.slice(0, 20).reverse();
                    const values = dataVariable.values.slice(0, 20).reverse();

                    const chart = Highcharts.charts.find(c => c.renderTo.id === chartId);
                    if (chart) {
                        chart.series[0].setData(values, true);
                        chart.xAxis[0].setCategories(categories, true);
                    }
                }
            });
        }

        function populateTable(data, tableId, paginationId, page) {
            const tableBody = $(`#${tableId} tbody`);
            const pagination = $(`#${paginationId}`);
            tableBody.empty();
            pagination.empty();

            const start = (page - 1) * itemsPerPage;
            const end = Math.min(start + itemsPerPage, data.categories.length);

            for (let i = start; i < end; i++) {
                const row = `<tr>
                    <td>${data.categories[i]}</td>
                    <td>${data.values[i]}</td>
                </tr>`;
                tableBody.append(row);
            }

            const totalPages = Math.ceil(data.categories.length / itemsPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = `<li class="page-item ${i === page ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
                pagination.append(pageItem);
            }

            $('.page-link').click(function(e) {
                e.preventDefault();
                const newPage = $(this).data('page');
                populateTable(data, tableId, paginationId, newPage);
            });
        }

        $('#showTemperatureData').click(function() {
            populateTable(temperatureData, 'temperatureTable', 'temperaturePagination', 1);
            $('#temperatureTableContainer').toggle();
        });

        $('#showHumidityData').click(function() {
            populateTable(humidityData, 'humidityTable', 'humidityPagination', 1);
            $('#humidityTableContainer').toggle();
        });

        $('#showGasData').click(function() {
            populateTable(gasData, 'gasTable', 'gasPagination', 1);
            $('#gasTableContainer').toggle();
        });

        $('#showRainData').click(function() {
            populateTable(rainData, 'rainTable', 'rainPagination', 1);
            $('#rainTableContainer').toggle();
        });

        // Initial load of charts
        loadChart('temperature', '/data/1', temperatureData = {}, 'Temperature', 'Value');
        loadChart('humidity', '/data/2', humidityData = {}, 'Humidity', 'Value');
        loadChart('gas', '/data/3', gasData = {}, 'Gas', 'Value');
        loadChart('rain', '/data/4', rainData = {}, 'Rain Status', 'Value');

        // Set interval to update charts
        setInterval(() => {
            updateChart('temperature', '/data/1', temperatureData);
            updateChart('humidity', '/data/2', humidityData);
            updateChart('gas', '/data/3', gasData);
            updateChart('rain', '/data/4', rainData);
        }, updateInterval);
    });
</script>
@endpush
