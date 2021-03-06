@extends('layouts.main')

@section('title', 'Veja Todos Os Projetos')

@section('content')

@include('layouts.navbar')

<div class="d-flex">

  @include('layouts.sidebar')

  <div class="content p-1">
    <div class="list-group-item">
      <div class="d-flex">
        <div class="mr-auto p-2">
          <h2 class="display-4 titulo">
            Projetos
            @if (Route::currentRouteName() === 'projects.participating')
            em que fui aprovado
            @endif
          </h2>
        </div>
      </div>

      @include('hintMessages')

      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th class="d-none d-sm-table-cell">Código</th>
              <th class="d-none d-lg-table-cell">Edital Anexado</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($projects as $project)

            @if ($user->hasRole('bolsista') || $project->teachers_id === $user->id)

            <tr>
              <th>{{ $project->id }}</th>
              <td>{{ $project->title }}</td>
              <td class="d-none d-sm-table-cell">{{ $project->code }}</td>
              <td class="d-none d-lg-table-cell">

                {{ isset($project->edict->edict_title) ? $project->edict->edict_title :
                $project->edict_title }}

              </td>

              <td class="text-center">
                <span class="d-none d-md-block">

                  @if (Request::route()->getName() === 'projects.showAll')
                  <a href="{{ route('works_plans.create', $project->id) }}" class="btn btn-outline-primary btn-sm">
                    Adicionar Plano de Trabalho
                  </a>
                  @elseif(Request::route()->getName() === 'projects.participating')
                  <a href="{{ route('works_plans.showWorkPlansThatProject', $project->project_id) }}"
                    class="btn btn-outline-primary btn-sm">
                    Ver Planos de Trabalho
                  </a>
                  @endif

                </span>

                <div class="dropdown d-block d-md-none">
                  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                  </button>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                    @if (Request::route()->getName() === 'projects.showAll')
                    <a href="{{ route('works_plans.create', $project->id) }}" class="dropdown-item">
                      Adicionar Plano de Trabalho
                    </a>
                    @elseif(Request::route()->getName() === 'projects.participating')
                    <a href="{{ route('works_plans.showWorkPlansThatProject', $project->id) }}" class="dropdown-item">
                      Ver Planos de Trabalho
                    </a>
                    @endif

                  </div>
                </div>
              </td>
            </tr>
            @endif

            @endforeach

          </tbody>
        </table>

      </div>
    </div>

  </div>

</div>

@endsection
