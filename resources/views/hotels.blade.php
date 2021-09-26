<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>

<body class="antialiased">

<div
    class="relative  items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div id="users">

                <div class="container">
                    <div class="row mt-5 mb-5 pr-5 pl-5 ml-2 mr-2">
                        <div class="col-md-12">
                            <form class="form-inline" method="GET" action="{{url('/')}}">
                                <div class="col-xs-6">
                                    <h5>From Date <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" id="start_date"
                                               class="form-control datepicker-autoclose"
                                               placeholder="Please select start date"
                                               value="{{$request->fromDate}}">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-xs-6">

                                    <h5>To Date <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" id="start_date"
                                               class="form-control datepicker-autoclose"
                                               placeholder="Please select start date"
                                               value="{{$request->toDate}}">
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="col-xs-6">

                                    <h5>City <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="city" id="start_date"
                                               class="form-control datepicker-autoclose"
                                               placeholder="Type A City"
                                               value="{{$request->city}}">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-xs-6">

                                    <h5>Number Of Adults <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="number" name="numberOfAdults" id="start_date"
                                               class="form-control datepicker-autoclose"
                                               placeholder="Number Of Adults"
                                               value="{{$request->numberOfAdults}}">
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <button type="submit"
                                            class="btn btn-outline-primary mt-4 ml-2 mr-2">Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row float-left">
                        <div class="col-lg-12">
                                <a target="_blank" href="{{url('/hotels/available')}}"
                                   class="btn btn-outline-primary">
                                    Get Available in JSON format
                                </a>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-lg-12">
                            @if(Request::route('hotel_name'))
                                    <a href="{{url('/')}}" class="btn btn-outline-primary">Back to
                                        list
                                    </a>
                            @endif
                        </div>
                    </div>
                    <div class="row clearfix "style="clear: both">
                        <div class="col-md-12">
                            <h5 class="m-4 text-black-50 text-center">Table of Content</h5>
                            @if(!Request::route('hotel_name'))
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="bg-light text-black-50 text-center">
                                    <tr>
                                        <td>Provider Name</td>
                                        <td>Hotel Name</td>
                                        <td>fare</td>
                                        <td>Amenities</td>
                                        <td>actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (sizeof($content) == 0)
                                        <tr>
                                            <td colspan="5">No Hotels to display.</td>
                                        </tr>
                                    @endif
                                    @foreach($content as $key =>$item)

                                        <tr>
                                            <td>
                                                {{ $item['provider'] }}</td>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['fare'] }}</td>
                                            <td>{{ $item['amenities'] }}</td>
                                            <td>
                                                <a href="{{'/hotels/details/'.str_replace(' ','_',$item['title'])}}">
                                                    Details</a></td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="bg-light text-black-50 text-center">
                                    <tr>

                                        <td>Hotel Name</td>
                                        <td>Hotel Rate</td>
                                        <td>fare</td>
                                        <td>Amenities</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (sizeof($content) == 0)
                                        <tr>
                                            <td colspan="5">No Hotels to display.</td>
                                        </tr>
                                    @endif
                                    @foreach($content as $key =>$item)

                                        <tr>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['rate'] }}</td>
                                            <td>{{ $item['fare'] }}</td>
                                            <td>{{ $item['amenities'] }}</td>


                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

