@foreach($comments as $comment)
<div class="card p-3" style=" margin-bottom:5px; border: none; box-shadow: 5px 6px 6px 2px #e9ecef; border-radius: 4px;">
    <div class="d-flex justify-content-between align-items-center">
        <div class="user d-flex flex-row align-items-center">
            <img src="{{ asset('img/user1-128x128.jpg') }}" style="max-height: 40px;max-width: 40px;" class="user-img rounded-circle mr-2">
            <strong>{{ $comment->user->name }}</strong>
        </div>
    <small>{{ $comment->created_at }} </small>
    </div>
    <div class="action d-flex justify-content-between align-items-center">
        <div class="reply px-4" style="margin-left: 25px">
            <p>{{ $comment->body }}</p>
        </div>
        <div class="rated">
        @for($i=1; $i<=$comment->rating; $i++)
            <span><i class="fa fa-star text-warning"></i></span>
        @endfor
        </div>
    </div>
</div>
@endforeach