@extends('admin.layouts.app')
@section('page_title', 'Create country')

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
    <form method="post" action="{{route('country.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create interested country</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <!-- <h3>country Details</h3> -->
                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Interested country name</label>
                                <input class="form-control" name="title" value="{{old('title')}}" type="text"
                                    placeholder="Enter country">
                            </div>

                        </div>

                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input name="publish" type="checkbox" checked>
                                <span class="input-span"></span>Publish</label>
                        </div>

                        <br>

                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">Save</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
@endpush