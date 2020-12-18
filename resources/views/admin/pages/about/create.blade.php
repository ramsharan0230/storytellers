@extends('admin.layouts.app')
@section('page_title', 'Create About us')
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
    <form method="post" action="{{route('pages.about.store')}}" enctype="multipart/form-data">
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
                                    <label>Title</label>
                                    <input class="form-control" name="title" value="{{old('title')}}" type="text"
                                        placeholder="Enter Title">
                                </div>
        
                                <div class="form-group">
                                    <label>Highlight Text</label>
                                    <textarea name="highlight_text" class="form-control" rows="8"
                                        cols="80">{{old('highlight_text')}}</textarea>
                                </div>
        
                                <div class="form-group">
                                    <label>First Paragraph</label>
                                    <textarea name="first_paragraph" class="form-control" rows="8"
                                        cols="80">{{old('first_paragraph')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Second Paragraph</label>
                                    <textarea name="second_paragraph" class="form-control" rows="8"
                                        cols="80">{{old('second_paragraph')}}</textarea>
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Select Logo Image</label>
                                    <input type="file" id="fileUpload" class="form-control" name="about_logo">
                                    <div id="wrapper" class="mt-2">
                                      <div id="image-holder">
                                      </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Banner Image</label>
                                    <input type="file" id="fileUpload" class="form-control" name="image">
                                    <div id="wrapper" class="mt-2">
                                      <div id="image-holder">
                                      </div>
                                    </div>
                                </div>
                            </div>
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