@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                    </div>
                    <div class="card-body text-right">
                        {{ route('todo.index') }}
                    </div>
                    <div class="card-body">
                        {{--@include('layouts.falsh')--}}
                        <x-alert>
                            <p class="text-muted">محل نمایش پیغام آپلود تصویر پروفایل</p>
                        </x-alert>
                        <form action="/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image"/>
                            <input type="submit" name="upload"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
