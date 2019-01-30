@extends('layouts.main_layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <a id="addEducation" class="btn btn-success float-right" href="#" onclick="coddingModalAdd()" >
                <i class="fa fa-plus" aria-hidden="true"></i>  Add Name
            </a><br /><br />

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                @if(Session::has('user-add'))
                    <div class="alert alert-success">{{Session::get('user-add')}}</div>
                @elseif(Session::has('user-update'))
                    <div class="alert alert-success">{{Session::get('user-update')}}</div>
                @elseif(Session::has('user-delete'))
                    <div class="alert alert-danger">{{Session::get('user-delete')}}</div>
                @endif
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>name</th>
                            <th>age</th>
                            <th width="1%">action</th>
                            <th width="1%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $i=>$user)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->age}}</td>
                                <td>
                                    <div class="clearfix">
                                        <a class="btn btn-info " href="#" onclick="coddingModalEdit({{$user->id}})">
                                            <i class="fa fa-edit" aria-hidden="true"></i>update
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="clearfix">
                                    {!! Form::open(['route' => ['deleteUserById',$user->id],'method' => 'DELETE',
                                        'onclick'=>'return confirm("هل أنت متأكد من هذا الحذف")','class'=>'btn btn-danger']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
    @include('user.modal')
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function coddingModalAdd(){
            save_method='add';
            $('input[name=_method]').val('POST');
            $('#manageCodingModal').modal('show');
            $('#frmManageCoding')[0].reset();
            $('.modal-title').text('Add New User');
        }
        function coddingModalEdit(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PUT');
            $('#frmManageCoding').attr('action', '{!! route("updateUserById",["id" => '']) !!}'+'/'+id);
            var Link = "{!! route('getUserById',['id' => '']) !!}"+"/"+id;
            $.ajax({
                url: Link,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#manageCodingModal').modal('show');
                    $('.modal-title').text('Edit At Current User');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#age').val(data.age);
                },
                error: function () {
                    alert('Oops! Something went wrong!');
                }
            });
        }



    </script>
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection