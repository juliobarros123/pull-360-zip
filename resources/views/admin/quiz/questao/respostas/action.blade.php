<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">

        @if (substr($resposta, 0, 19) == 'quiz/repostas/file/')
            <a href="{{ route('quizzes.questoes.respostas.editar_file', $slug) }}"
                class="dropdown-item small">Editar</a>
        @else
            <a href="{{ route('quizzes.questoes.respostas.editar', $slug) }}"
                class="dropdown-item small">Editar</a>
        @endif
        @if (!$estado == 1)
            
            <a href="{{ route('quizzes.questoes.respostas.editar_estado',['slug' =>$slug, 'estado'=>1]) }}"
                class="dropdown-item small">Tornar certa</a>
                @else
                <a href="{{ route('quizzes.questoes.respostas.editar_estado',['slug' =>$slug, 'estado'=>0]) }}"
                    class="dropdown-item small">Tornar errada</a>
        @endif

    </div>
</div>