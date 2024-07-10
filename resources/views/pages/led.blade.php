@extends('layouts.dashboard')

{{-- @section('title_menu', 'LED Control') --}}

@section('content')
    <div class="container">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between align-items-center">
                <div class="iq-header-title">
                    <h4 class="card-title">LED List</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($leds as $led)
                    <div class="col-md-4">
                        <div class="mb-2 card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $led->nama_led }}</h5>
                                <h5 class="card-title"> Pin : {{ $led->pin }}</h5>
                                <label class="switch">
                                    <input type="checkbox" class="toggle-switch" data-id="{{ $led->id }}"
                                        {{ $led->status ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #808080;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: rgb(255, 255, 255);
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-switch').change(function() {
                var ledId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/leds/' + ledId + '/status',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                });
            });
        });
    </script>
@endsection
