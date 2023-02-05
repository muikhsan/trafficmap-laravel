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
                            <h2>CCTV Management</h2>
                        </div>
                        <div class="mb-2 float-right">
                            <a class="btn btn-success" href="{{ route('cctvs.create') }}"> Create New CCTV Connection</a>
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
                        <th>No</th>
                        <th>Location</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Embed Link</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($cctvs as $cctv)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $cctv->lokasi }}</td>
                        <td>{{ $cctv->lat }}</td>
                        <td>{{ $cctv->lng }}</td>
                        <td>{{ $cctv->embed }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('cctvs.show',$cctv->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('cctvs.edit',$cctv->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['cctvs.destroy',
                            $cctv->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
