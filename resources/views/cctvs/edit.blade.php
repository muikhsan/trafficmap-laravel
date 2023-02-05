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
                            <h2>Edit CCTV</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cctvs.index') }}"> Back</a>
                        </div>
                    </div>
                </div>


                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <form action="{{ route('cctvs.update',$cctv->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Lokasi:</strong>
                                <input type="text" name="lokasi" value="{{ $cctv->lokasi }}" class="form-control"
                                    placeholder="Lokasi CCTV">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Latitude</strong>
                                <input type="number" step="0.0000001" name="lat" value="{{ $cctv->lat }}" class="form-control"
                                    placeholder="Latitude CCTV">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Longitude</strong>
                                <input type="number" step="0.0000001" name="lng" value="{{ $cctv->lng }}" class="form-control"
                                    placeholder="Longitude CCTV">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Embed Link:</strong>
                                <input type="text" name="embed" value="{{ $cctv->embed }}" class="form-control"
                                    placeholder="Embed Link CCTV">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
