@foreach ($memes as $mem)
    <div class="card bg-kenons pb-2 m-3">
        @if (auth()->user()->staff)
            <button type="button" class="btn text-right pb-0" aria-label="Remove from home">
                <i class="fas fa-times-circle"></i>
            </button>
        @endif
        <div class="card-body bg-kenons ">
            <center><a href="/memes/{{ $mem->id }}"><h3>{{ $mem->title }}</h3></a></center>
            @if($mem->type == 'img')
                <center><img src="{{asset('img/memes').'/'.$mem->name.'.'.$mem->format}}" class="img-responsive border border-dark rounded" width="{{ $width }}"></center>
            @elseif ($mem->type == 'gif')
                <center>
                    <video width="{{ $width }}" controls class="border">
                        <source src="{{asset('img/memes').'/'.$mem->name.'.'.$mem->format}}" type="video/{{$mem->format}}">
                    </video>
            </center>
            @endif
        </div>
        <div class="container">
            <div class="text-center">
                <button class="btn btn-primary m-2">
                    <i class="fas fa-save"></i>
                </button>
                <a class="btn btn-primary m-2" href="{{asset('img/memes').'/'.$mem->name.'.'.$mem->format}}" download="{{ str_replace(' ', '_', $mem->title).'.'.$mem->format }}">
                    <i class="fas fa-cloud-download-alt"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach 
