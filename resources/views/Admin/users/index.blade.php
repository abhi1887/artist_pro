@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between m-3">
        <h2 class="h3 mb-0 text-gray-800">Users</h2>
    </div>

    <div class="push-top ml-3">

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        @if(count($users) > 0)
        <div class="table-responsive">
            <table class="table table-hover" id="usersTable">
                <thead>
                    <tr class="table-warning">
                        <th>#</th>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Comments</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->bio }}</td>
                            <td>
                                <u style="cursor: pointer;" class="viewComment" data-id="{{ $user->id }}">{{ __('View Comments') }}</u>
                            </td>
                            <td class="text-center">
                                @if (!$user->hasRole('vendor'))
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'class' => 'deleteForm']) !!}
                                        <button class="btn btn-danger btn-sm deleteUser" type="button">Delete</button>
                                    {!! Form::close() !!}
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="row">
            <div class="col-6">
                <strong> No data found! </strong>
            </div>
        </div>
        @endif
    </div>

    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Comment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="commentContent" style="height:500px;overflow-y:scroll;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">        
        $(document).on('click', '.viewComment', function(){
            $("#pageloader").fadeIn();
            var userid = $(this).data('id');

            var data = {
                userid: userid,
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "{{ url('/get-comment') }}",
                method: 'get',
                data: data,
                success: function(response) {
                    // console.log(response);
                    $('#commentModal').modal('show');
                    if(response != '') {
                        $('#commentContent').html(response);
                    }
                    else {
                        $('#commentContent').html('No comment found!');
                    }
                    $("#pageloader").fadeOut();
                },
                error: function(xhr) {
                    toastr.error('Something Went Wrong, Please Try Again');
                    $("#pageloader").fadeOut();
                }
            });
        });

        $(document).on('click', '.deleteComment', function(){
            var result = confirm("Are you sure you want to delete this comment?");
            if (result == false) {
                $("#pageloader").hide();
                return false;
            }
            $("#pageloader").fadeIn();
            var thisa = $(this);
            var commentid = $(this).data('comment-id');

            var data = {
                commentid: commentid,
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "{{ url('/delete-comment') }}",
                method: 'POST',
                data: data,
                success: function(response) {
                    if(response == true) {
                        $(thisa).closest('.comment').remove();
                    }
                    $("#pageloader").fadeOut();
                },
                error: function(xhr) {
                    toastr.error('Something Went Wrong, Please Try Again');
                    $("#pageloader").fadeOut();
                }
            });
        });

        $(document).on('click', '.deleteUser', function(){
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {
                $(this).closest('form').submit();
            } else {
                return false;
            }
        });
    </script>
@endsection
