    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <style type="text/css">
        #map {
            border: 1px solid red;
            width: 100%;
            height: 700px;
        }

        .modal-dialog {
            max-width: 1024px;
            margin: 3px auto;
        }



        .modal-body {
            position: relative;
            padding: 0px;
        }

        .close {
            position: absolute;
            right: 0px;
            top: 0;
            z-index: 999;
            font-size: 2rem;
            font-weight: normal;
            color: #fff;
            opacity: 1;
        }

    </style>
    <x-app-layout>
        <x-slot name="title">
            Home
        </x-slot>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </x-slot>

        <div class="flex">
            <div class="flex-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="flex py-4">
            <div class="flex-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="mb-2 float-left">
                                        <h2>CCTV List</h2>
                                    </div>
                                    <div class="mb-2 float-right">
                                    </div>
                                </div>
                            </div>


                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif


                            <table class="table table-bordered">
                                <tr>
                                    <th width="40px">No</th>
                                    <th>Location</th>
                                    <th width="120px">Preview</th>
                                </tr>
                                @foreach ($cctvs as $cctv)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $cctv->lokasi }}</td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="modal" data-src="{{ $cctv->embed }}"
                                            data-target="#myModal{{ $cctv->id }}">Show</a>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                <div class="modal fade" id="myModal{{ $cctv->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">


                                            <div class="modal-body">

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <!--aspect ratio -->
                                                <x-embed url="{{ $cctv->embed }}" aspect-ratio="16:9"/>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                var map = new GMaps({
                    div: '#map',
                    lat: 0.472332,
                    lng: 101.394799,
                    zoom: 14,
                });
                map.addLayer('traffic');
                @foreach($cctvs as $cctv)
                map.addMarker({
                    lat: {{ $cctv -> lat }},
                    lng: {{ $cctv -> lng }},
                    title: '{{ $cctv->lokasi }}',

                    click: function (e) {
                        alert('This is ' + '{{ $cctv->lokasi }}');
                    }
                });
                @endforeach

                // Gets the video src from the data-src on each button
                var $videoSrc;
                $('.video-btn').click(function () {
                    $videoSrc = $(this).data("src");
                });

                // when the modal is opened autoplay it  
                $('#myModal').on('shown.bs.modal', function (e) {

                    // set the video src to autoplay and not to show related video.
                    $("#video").attr('src', $videoSrc +
                        "?autoplay=0&amp;modestbranding=1&amp;showinfo=0");
                })

                // stop playing the youtube video when I close the modal
                $('#myModal').on('hide.bs.modal', function (e) {
                    // a poor man's stop video
                    $("#video").attr('src', $videoSrc);
                })
            });

        </script>

    </x-app-layout>
