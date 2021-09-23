@extends('admin.layout.default')
@section('css')
@endsection

@section('content')
<div class="row">
    <!-- With Action-->
    <div class="col s12">
        <div class="card-panel">
            <div class="row">
                <form class="col s12" action="{{ url('admin/edit_aftercompanysignup') }}" method="POST">
                    
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <textarea id="editor1" cols="30" rows="10" name="content">{{$aftercompanysignup->content}}</textarea>
                    <div style="text-align:right">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsPostApp') 
  <script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>       
<script>
    $(document).ready(function() {
        //- config.extraPlugins = 'widget';
        CKEDITOR.replace( 'editor1');
    });
  </script>
@endsection
