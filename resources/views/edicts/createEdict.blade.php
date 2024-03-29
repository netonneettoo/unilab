@extends('layouts.main')

@section('title', 'Crie seu Edital')

@section('content')

@include('layouts.navbar')

<div class="d-flex">

  @include('layouts.sidebar')

  <div class="form-create bg-white m-1">
    <div class="form-type-4">

      <h1 class="titulo">Crie Um Edital</h1>
      <form action="{{ route('edicts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div id="form-area">
          <div class="form-content">

            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text mb-0" for="title">Titulo do Edital</label>
                </div>
                <input type="text" name="edict_title"
                  class="form-control {{ $errors->has('edict_title') ? 'is-invalid' : '' }}" id="title">

                <div class="invalid-feedback">
                  @foreach ($errors->get('edict_title') as $error)
                  {{ $error }}
                  @endforeach
                </div>
              </div>
            </div>

            <div class="form-group">

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Arquivo do Edital</span>
                </div>
                <div class="custom-file">

                  <input id="input-file" type="file" name="archive"
                    class="custom-file-input {{ $errors->has('archive') ? 'is-invalid' : '' }}" id="archive"
                    style="z-index: 2 !important">
                  <label id="file-name" class="custom-file-label text-left mb-0" for="archive" data-browse="&#128269">

                    <div class="text-danger">
                      @foreach ($errors->get('archive') as $error)
                      {{ $error }}
                      @endforeach
                    </div>
                    Selecione um arquivo

                  </label>
                </div>
              </div>


            </div>

            <div class="form-group">

              <label class="input-group-text mb-0" for="description">Descrição do Edital</label>

              <textarea class="{{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                id="description" rows="5"></textarea>

              <div class="invalid-feedback">
                @foreach ($errors->get('description') as $error)
                {{ $error }}
                @endforeach
              </div>

            </div>
          </div>

          <div class="form-content">

            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="submission_start">Início da Submissão</label>

                <input type="date" name="submission_start" id="submission_start"
                  class="form-control {{ $errors->has('submission_start') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('submission_start') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="submission_finish">Término da Submissão</label>

                <input type="date" name="submission_finish" id="submission_finish"
                  class="form-control {{ $errors->has('submission_finish') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('submission_finish') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="rate_start">Início da Avaliação</label>

                <input type="date" name="rate_start" id="rate_start"
                  class="form-control {{ $errors->has('rate_start') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('rate_start') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="rate_finish">Término da Avaliação</label>

                <input type="date" name="rate_finish" id="rate_finish"
                  class="form-control {{ $errors->has('rate_finish') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('rate_finish') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="execution_start">Início da Execução</label>

                <input type="date" name="execution_start" id="execution_start"
                  class="form-control {{ $errors->has('execution_start') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('execution_start') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="execution_finish">Término da Execução</label>

                <input type="date" name="execution_finish" id="execution_finish"
                  class="form-control {{ $errors->has('execution_finish') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                  @foreach ($errors->get('execution_finish') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="min_titulation">Titulação Mínima</label>

                <select class="form-control {{ $errors->has('min_titulations_id') ? 'is-invalid' : '' }}"
                  name="min_titulations_id" id="min_titulation">

                  <option value="">Selecione</option>

                  @foreach ($min_titulations as $titulation)
                  <option value="{{ $titulation->id }}">{{ $titulation->titulation }}</option>
                  @endforeach
                </select>

                <div class="invalid-feedback">
                  @foreach ($errors->get('min_titulations_id') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>

              <div class="form-group col-md-6">

                <label class="input-group-text mb-0" for="category">Categoria</label>

                <select class="form-control {{ $errors->has('categories_id') ? 'is-invalid' : '' }}"
                  name="categories_id" id="category">

                  <option value="">Selecione</option>

                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>

                <div class="invalid-feedback">
                  @foreach ($errors->get('categories_id') as $error)
                  {{ $error }}
                  @endforeach
                </div>

              </div>
            </div>

          </div>
        </div>

        <button type="submit" class="btn btn-success">
          <i class="fas fa-file-medical"></i>
          Criar Edital
        </button>
      </form>
    </div>
  </div>

</div>

@endsection

@section("script")
<script>
  $('#input-file').change(()=>{
    var label = document.getElementById("file-name");
    var input = document.getElementById("input-file");

    if(input.files.length > 0){
      label.innerHTML = input.files[0].name;
    }
  });
</script>


<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
  });
</script>
@endsection
