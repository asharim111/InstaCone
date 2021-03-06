@extends('layouts.app')

@section('content')
<style>
    .container {
    max-width: 1100px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-4">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <h4>
                        {{ $user->username }}
                    </h4>
                    
                    <follow-button></follow-button>
                </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">
                    Edit Profile
                </a>
            @endcan

            <div class="d-flex">
                <div style="padding-right: 35px"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div style="padding-right: 35px"><strong>52k</strong> followers</div>
                <div style="padding-right: 35px"><strong>500</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold" style="font-weight: bold;">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div style="font-weight: bold;">
                <a href="#">
                    {{ $user->profile->url ?? 'N/A' }}
                </a>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
