@extends('admin.layouts.app')
@section('page_title', 'Create Contact')
@push('styles')
<style media="screen">
    .line {
        width: 100%;
        height: 1px;
        background-color: green;
    }
</style>
@endpush

@section('content')

<div class="page-content fade-in-up">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{route('pages.contact.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Page</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" value="{{old('address')}}" type="text"
                                        placeholder="Enter Address">
                                </div>
        
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control" name="telephone" value="{{old('telephone')}}" type="text"
                                        placeholder="Enter Telephone">
                                </div>
        
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input name="email" class="form-control" placeholder="Email Address"  value="{{old('email')}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="8"
                                        cols="80">{{old('description')}}</textarea>
                                </div>
        
                                <div class="check-list">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input name="published" type="checkbox">
                                        <span class="input-span"></span>Publish</label>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <pre id="output"></pre>
</div>

@endsection

@push('scripts')
{{-- @include('admin.layouts._partials.ckeditorsetting') --}}
@include('admin.layouts._partials.imagepreview')

@endpush