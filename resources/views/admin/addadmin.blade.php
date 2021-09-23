@extends('admin.layout.default')

@section('content')
    <div class="main-container">
        <div class="row" style="margin-top:10px !important;">
            {{--  Flash Message  --}}
            <div class="col s12">
                @include('flash')
            </div>
            <form class="col m6 s12 profile-info-form" role="form" method="POST" action="{{ url('/admin/subprofile/')}}">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="card-panel profile-form-cardpanel">
                    <div class="row box-title">
                        <div class="col s12">
                            <h5>Profile Information</h5>
                        </div>
                    </div>
                    <div class="row">
                        {{--   ADMIN USER NAME  --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input type="text" id="name" name="name"  autofocus>
                            <label for="name">Name</label>
                        </div>
                        {{--   ADMIN DESIGNATION  --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">bookmark</i>
                            <input class="validate" type="text" id="designation" name="designation" value="Second Admin" autofocus Readonly>
                            <label for="name">designation</label>
                        </div>
                        {{--  ADMIN EMAIL  --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input class="validate" type="email" id="email" name="email"  autofocus>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 right-align">
                        <button class="btn waves-effect waves-set" type="submit" name="update_profile">Update<i class="material-icons right">save</i>
                        </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection