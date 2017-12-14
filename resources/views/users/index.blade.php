@extends('layouts.app')
@section('title', 'Users | All')
@section('content')
    <div class="container">
        <div class="table-responsive col-md-10 col-md-offset-1">
            <h1>All Users</h1>
            <table class="table table-striped" id="users">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            oTable = $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('users.data') }}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>
@endsection