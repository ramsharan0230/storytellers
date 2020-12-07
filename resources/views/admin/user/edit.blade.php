@extends('admin.layouts.app')
@section('page_title', 'Edit user')

@section('content')


<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Edit user</div>

          <div class="ibox-tools">
          </div>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="ibox-body" style="">
          <form method="post" action="{{route('user.update',$detail->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="role" value="admin">

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="name" value="{{$detail->name}}"
                    placeholder="Enter full name">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{$detail->email}}"
                    placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" value="{{old('password')}}"
                    placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label>Re-Password</label>
                  <input type="password" class="form-control" name="password_confirmation"
                    value="{{old('password_confirmation')}}" placeholder="Enter Password">
                </div>

                <div class="check-list">
                  <label class="ui-checkbox ui-checkbox-primary">
                    <input name="publish" type="checkbox" {{ $detail->publish == 1 ? 'checked': ''}}>
                    <span class="input-span"></span>Publish</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ibox">
                  <div class="ibox-head">
                    <div class="ibox-title">Permissions</div>
                    <div class="ibox-tools">
                    </div>
                  </div>
                  <div class="ibox-body" style="">
                    @if(isset($access_options) && count($access_options))
                    @foreach($access_options as $key => $option)
                    <div class="check-list mb-3">
                      <label class="ui-checkbox ui-checkbox-primary">
                        <input type="checkbox" value={{ $key }} name="access[]"
                          {{ in_array($key, $oldAccesses) ? 'checked' : ''}}>
                        <span class="input-span"></span>{{ $option }}</label>
                    </div>
                    @endforeach
                    @endif

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