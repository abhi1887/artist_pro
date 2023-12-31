@extends('Frontend.layouts.front')

@section('content')
<div class="col-12 content ">
    @if(count($users) > 0)
        @foreach ($users as $user)
            <div class="col-lg-12 col-md-12 col-sm-12 userData" style="background:red; padding: 20px;">
                <div class="row">
                    <div class="col-lg-4 col-lg-4 col-sm-4 text-right">
                        <img src="{{ asset('/user_images/' . $user->image) }}" alt="{{ $user->image }}" class="image-item mt-3" width="350px" height="400px">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8" style="color: #fff">
                        <div class="col-lg-12 col-md-10 col-sm-12 text-left" style="color: #fff;">
                            <h2> {{ $user->name }} </h2>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 " style="color: #fff;padding: 0px 10px;font-size:medium; height:310px;overflow-y:auto;">
                            {{ $user->bio }}
                        </div>
                    </div>
                </div>
                @if(count($user->comments) > 0)
                <div class=" col-lg-10 col-md-10 col-sm-12  comments-block" style = "overflow-y:scroll;height:150px; margin-bottom:10px; margin-left:7%; margin-top: 1%; padding:0%; ">
                    @foreach ($user->comments as $comment)
                    <div class="row" style="background:#fff; padding: 5px; margin: 3px 0; font-size: small;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> Review Date  {{ date('d/m/Y', strtotime($comment->created_at)) }} </p>
                            <p> {{ $comment->comment }} </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="row" style="margin: 10px 0;">
                    <textarea name="comment" id="comment_{{ $user->id }}" placeholder = "You Can Write Comment Here..." rows="4" cols="150"  style=" margin-left:7%;"> </textarea>
                    <button class="saveComment" style = "position: relative; top: -29px; padding: 14px 38px;" data-id="{{ $user->id }}">Comment</button>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script>
    $(document).on('click', '.saveComment', function(){
        $("#pageloader").fadeIn();
        var thisa = $(this);
        var userid = $(this).data('id');
        var comment = $('#comment_' + userid).val();

        if($.trim(comment) == '') {
            $('#comment_' + userid).val('');
            $("#pageloader").fadeOut();
            return false;
        }

        var data = {        
            userid: userid,
            comment: comment,
        }

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "{{ url('/save-comment') }}",
            method: 'POST',
            data: data,
            success: function(response) {
                var div = $(thisa).closest('.userData').find('.comments-block');
                div.append(response);
                $('#comment_' + userid).val('');
                thisa.closest('.userData').find('.comments-block').scrollTop(div.prop('scrollHeight'));
                $("#pageloader").fadeOut();
            },
            error: function(xhr) {
                toastr.error('Something Went Wrong, Please Try Again');
                $("#pageloader").fadeOut();
            }
        });

    });
</script>

@endsection
