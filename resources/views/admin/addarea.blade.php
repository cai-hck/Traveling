@extends('admin.layout.default')


@section('content')
{{-- Tables --}}
<div class="row">
    <!-- With Action-->
    <div class="col s12">
        <div class="card-panel">
            <div class="row box-title">
                <div class="col s12">
                    <h5 class="content-headline">Area Table</h5>
                    <p>You can Create, Edit and Delete.</p>
                </div>
                <a class="btn-floating btn-large waves-effect waves-light red goodmodel" href="#modal1" data-target="modal1"><i class="material-icons">add</i></a>
                <!-- Modal Structure -->
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="datatable-wrapper">
                        <table class="datatable-badges display cell-border" style="text-align:center">
                            <thead>
                            <tr>
                                <th>Area Name(English)</th>
                                <th>Area Name(Arabic)</th>
                                <th>City Name(Arabic)</th>
                                <th>Created Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $area)
                                    <tr>
                                        <td>{{$area->english }}</td>
                                        <td>{{$area->arabic }}</td>
                                        <td>{{$area->city }}</td>
                                        <td>{{Carbon\Carbon::parse($area->created_at)->format('d-m-Y H:i:s')}}</td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="btn-floating warning-bg makemodal2" href="#modal2" data-target="modal2">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <input type="hidden" value="{{$area->id}}">
                                                <input type="hidden" value="{{$area->english}}">
                                                <input type="hidden" value="{{$area->arabic}}">
                                                <input type="hidden" value="{{$area->city}}">
                                                <a class="btn-floating error-bg" onclick="return confirm('Are you sure?')" href="{{ url('/admin/deletearea/'.$area->id)}}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal1" class="modal modal-fixed-footer" style="height: 350px;">
    <form action="{{ url('admin/newarea') }}" method="POST">
        <div class="modal-content">
            <h4>Create New Area</h4>
            <div class="input-field informatic-input col s12">
                <input class="validate" type="text"  name="english" placeholder="" required>
                <label for="simpletext-input">Area Name(English)</label>
            </div>
            <div class="input-field informatic-input col s12">
                <input class="validate" type="text" name="arabic" placeholder="" required>
                <label for="simpletext-input">Area Name(Arabic)</label>
            </div>
            <select class="select2_select" id="cities1" name="city" style="display: block;margin-top: 30px;">
            <?php foreach($cities as $city){?>
                <option value="{{$city->arabic}}">{{$city->english}}&nbsp/&nbsp{{$city->arabic}}</option>
            <?php }?>
            </select>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action  waves-effect waves-green btn-flat ">ADD</button>
        </div>
    </form>
</div>
<div id="modal2" class="modal modal-fixed-footer" style="height: 350px;">
    <form action="{{ url('admin/editarea') }}" method="POST">
        <div class="modal-content">
            <h4>Edit Area</h4>
            <input type="hidden" id="editid" name="id" placeholder="" required>
            <div class="input-field informatic-input col s12">
                <input class="validate" type="text" id="editenglish" name="english" placeholder="" required>
                <label for="simpletext-input">Area Name(English)</label>
            </div>
            <div class="input-field informatic-input col s12">
                <input class="validate" type="text" id="editarabic" name="arabic" placeholder="" required>
                <label for="simpletext-input">Area Name(Arabic)</label>
            </div>
            <select class="select2_select" id="cities2" name="city" style="display: block;margin-top: 30px;">
            <option value='' id="selectedareacity"></option>
            <?php foreach($cities as $city){?>
                <option value="{{$city->arabic}}">{{$city->english}}&nbsp/&nbsp{{$city->arabic}}</option>
            <?php }?>
            </select>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-green btn-flat ">UPDATE</button>
        </div>
    </form>
</div>
@endsection

@section('jsPostApp')        

<script>
    $(document).ready(function() {
		$('select[name=DataTables_Table_0_length]').show();
	});
    $('.makemodal2').on('click',function(){
        $('#editid').val($(this).next().val());
        $('#editenglish').val($(this).next().next().val());
        $('#editarabic').val($(this).next().next().next().val());
        $city = $(this).next().next().next().next().val();
        $("#selectedareacity").val($city);
        $("#selectedareacity").text($city);
    });
    $('.modal').modal();
    $('.datatable-badges').DataTable({
        columnDefs: [{
            width: '20%',
            targets: [0]
        }, {
            width: '20%',
            targets: [1]
        },{
            width: '20%',
            targets: [2]
        },{
            width: '30%',
            targets: [3]
        },{
            width: 'auto',
            targets: [4]
        }]
    });
</script>
@endsection
