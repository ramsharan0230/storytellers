@extends('admin.layouts.app')

@push('styles')
@endpush
@section('page_title', 'Edit sidead')

@section('content')

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit sidead </div>

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
                        <form method="post" action="{{ route('sidead.update', $detail->id) }}"
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
                                    <label>Link</label>
                                    <input name="link" value="{{ $detail->link }}" type="text" class="form-control" required
                                        placeholder="link">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Side ads</label>
                                    <input id="fileUpload1" class="form-control" name="image" type="file">
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder1">
                                            @if ($detail->image)
                                                <img src="{{ asset('images/main/' . $detail->image) }}"
                                                    style="margin-top:12px; margin-bottom:12px;" height="120px"
                                                    width="120px" alt="">
                                            @endif
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            fileUpload('#fileUpload1', '#image-holder1');
        });

        function fileUpload($selector, $imageHolder) {
            $($selector).on('change', function() {
                if (typeof(FileReader) != "undefined") {
                    var image_holder = $($imageHolder);
                    // $("#image-holder").siblings().remove();
                    $($imageHolder).children().remove();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "width": '50%'
                        }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            });
        }

    </script>
@endpush
