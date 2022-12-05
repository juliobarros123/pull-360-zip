
                <ul class="gallery-filter">
                    {{-- <li class="filter all active" data-filter="*">All</li> --}}
                    <li class="filter active" data-filter=".timeline"><a href="{{ route('timeline.index', ['slug' => $slug_user]) }}">Timeline</a></li>
                    {{-- <li class="filter" data-filter=".galeria">Galeria</li> --}}
                    <li><a href="{{ route('timeline.fotos-galeria', ['slug' => $slug_user]) }}">Galeria</a></li>
                    
                  <li><a href="{{ route('timeline.sobre', ['slug' => $slug_user]) }}">Sobre</a></li>
          
                </ul>