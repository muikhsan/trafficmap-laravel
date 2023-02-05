<x-app-layout>
    <x-slot name="title">
        CCTV
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CCTV') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="float-left">
                            <h2> Show CCTV</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cctvs.index') }}"> Back</a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lokasi:</strong>
                            {{ $cctv->lokasi }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Latitude</strong>
                            {{ $cctv->lat }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Longitude</strong>
                            {{ $cctv->lng }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Embed Link</strong>
                            {{ $cctv->embed }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Preview</strong>
                            <x-embed url="{{ $cctv->embed }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
