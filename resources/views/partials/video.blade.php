<div class="row">
    @foreach($posts as $key => $post)
        <div class="col-md-6 col-md-3">
            <video width="100%" controls="controls" poster="{{ asset('uploads/'.$post->uploadCoverFolder.'/'.$post->cover_filename) }}">
                <source src="{{ asset('uploads/'.$post->uploadFolder.'/'.$post->video_filename) }}"/>
            </video>
            <h3 class="active-large-thumbnail title-video" data-post-id="{{ $post->id  }}">{{ $post->title }} <div class="carre-white display-content-{{ $post->id }}"></div></h3>
            <div class="display-content-{{ $post->id }} detail-video"style="display: none" >
                <ul>
                    @if($post->client)
                        <li><span>Client /</span> {{ $post->client }}</li>
                    @endif
                    @if($post->realisateur)
                         <li><span> Réalisateur /</span> {{ $post->realisateur }}</li>
                    @endif
                    @if($post->title)
                        <li ><span>Title /</span> {{ $post->title }}</li>
                    @endif
                </ul>
                <ul>
                    @if($post->agence)
                        <li><span>Agence /</span> {{ $post->agence }}</li>
                    @endif
                    @if ($post->compositeur)
                        <li><span>Compositeur /</span> {{ $post->compositeur }}</li>
                    @endif
                    @if($post->sound_design)
                        <li><span>Sound desing /</span> {{ $post->sound_design }}</li>
                    @endif
                </ul>
            </div>
        </div>
    @endforeach
</div>