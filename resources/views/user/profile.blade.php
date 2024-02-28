@extends('layouts.main')

@section('content')
<div class="container text-muted">
    <div class="row mb-4">
        <div>
            <img src="{{ $userInfo->profile_photo_url }}" width="150px" class="rounded-full mx-auto"/>
            <h2 class="text-center mt-1">{{ $userInfo->name }}</h2>
        </div>
    </div>

    <div class="row p-3">
        <ul class="nav nav-tabs mb-3">
              @php
               $user_id  = $userInfo->id; 
               $comments = Route::current()->getName() == 'comment.user'; 
              @endphp
            <li class="nav-item" style="list-style:none">
                <a class="nav-link {{ $comments ? '' : 'active' }}" href="{{route('profile' , $user_id)}}">منشوراتي</a>
            </li>
            <li class="nav-item" style="list-style:none">
                <a class="nav-link {{ $comments ? 'active' : '' }}" href="{{ route('comment.user' , $user_id)}}">تعليقاتي</a>
            </li>
        </ul>

        @if ($comments)
        @include('user.comment_dept') 
        @else
        @include('user.post_dept')   
        @endif
       
    </div>   
</div>

@endsection