@extends('panel.layout')

@section('meta_title', 'Dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <h1>Dashboard</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('admin.dashboard.store') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label>{{ $data }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection