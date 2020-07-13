<div class="col-lg-3 col-xs-8">
    <div class="right-menu bg-orange">
        <h4>Теги</h4>
        <hr class="separator">
        @foreach($tags as $tag)
            <a href="{{route('posts.section', ['tag' => $tag->name])}}" class="menu-item">
                <img src="{{$tag->icon}}" alt="{{$tag->name}}" class="svg">
                {{$tag->name}}
            </a>
        @endforeach
    </div>
</div>
