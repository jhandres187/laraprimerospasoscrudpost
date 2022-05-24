<div>
    <h1>{{  $slot  }}</h1>

    @foreach ($posts as $p)
        <div>
            <h3>{{  $p->title  }}</h3>
            <p>{{  $p->description  }}</p>
            <a href="{{  route('web.blog.show', $p)  }}">Ir</a>
        </div>
    @endforeach
    <div>{{  $posts->links()  }}</div>
</div>