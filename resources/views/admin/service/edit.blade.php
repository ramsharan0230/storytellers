@extends('admin.layouts.app')

@push('styles')
@endpush
@section('page_title', 'Edit service')

@section('content')

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit service </div>

                        <div class="ibox-tools">

                        </div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="ibox-body" style="">
                        <form method="post" action="{{ route('service.update', $detail->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Exhibitor</label>
                                    <select name="exhibitor_id" class="form-control">
                                        <option value>-- select one --</option>
                                        @foreach ($exhibitors as $exhibitor)
                                            <option value="{{ $exhibitor->id }}"
                                                {{ $detail->exhibitor_id == $exhibitor->id ? 'selected' : '' }}>
                                                {{ $exhibitor->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Title</label>
                                    <input name="title" value="{{ $detail->title }}" type="text" class="form-control"
                                        required placeholder="title">
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="check-list col-md-3">
                                            <label class="ui-checkbox ui-checkbox-primary">
                                                <input name="publish" type="checkbox"
                                                    {{ $detail->publish == 1 ? 'checked' : '' }}>
                                                <span class="input-span"></span>Publish</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
