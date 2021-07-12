
@extends ('layouts.master')
@section('content')

<h4 style="background-color: lightcyan">From formManga.php in Views Folder</h4>
{{-- Lorsqu'on cliquera sur le bouton Valider ce sera la route validerManga qui sera invoquée. Pour le moment nous laisserons de côté le paramètre files. --}}
{!! Form::open(['url' => 'validerManga', 'file' => true]) !!}
<div class="col-md-12 well well-sm">
    <center><h1>Modifier un Genre</h1></center>
    <div class="form-horizontal">    
        <div class="form-group">
            <input type="hidden" name="id_manga" value="{{$manga->id_manga}}"/>
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
          
                    {{Form::text("titre", old("titre") ? old("titre") : (!empty($manga) ? $manga->titre : null),
                    [ "class" => "form-control", "placeholder" => "Titre", "required", "autofocus"])
                }}                     
            </div>
            @error('titre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror  
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbGenre' required>
                    <OPTION VALUE=0>Sélectionner un genre</option>
                    @foreach ($genres as $genre)
                        selected=""
                        <option  value="{{$genre -> id_genre}}"
                                @if ($genre->id_genre == $manga->id_genre)
                                selected ="selected"
                                @endif
                        > {{$genre->lib_genre}}</option>       
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Scenariste : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbScenariste' required>  

                    <OPTION VALUE=0>Sélectionner un Scenariste</option>
                        @foreach ($scenaristes as $scenariste)
                            selected=""
                            <option  value="{{$scenariste->id_scenariste}}"
                                    @if ($scenariste->id_scenariste == $scenariste->id_scenariste)
                                    selected ="selected"
                                    @endif
                            > {{$scenariste->prenom_scenariste}}</option>       
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Dessinateur : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbDessinateur' required>
                    <OPTION VALUE=0>Sélectionner un Dessinateur</option>
                        @foreach ($dessinateurs as $dessinateur)
                        selected=""
                        <option value="{{$dessinateur->id_dessinateur}}"
                            @if ($dessinateur->id_dessinateur == $dessinateur->id_dessinateur)
                            selected ="selected"
                            @endif
                        > {{$dessinateur->prenom_dessinateur}} </option>
                        @endforeach
                </select>
            </div>
        </div>     
        <div class="form-group">
            <label class="col-md-3 control-label">Prix : </label>
            <div class="col-md-3">
                <input type="text" name="prix" value="{{$manga->prix}}" class="form-control"  required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"> Couverture : </label>
            <div class="col-md-6">
                <input type="hidden" name="MAX_FILE_SIZE" value="204800"/>
                <input name="couverture" type="file" class="btn btn-default pull-left"/>
                <input type="hidden" name="couvertureHidden" value="{{$manga->couverture}}"/>                
                <img src='{{ URL::to('/') }}/images/{{$manga->couverture}}' class='img-responsive pull-right imgReduite' 
                     alt='{{$manga->couverture}}' />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                    onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>
            {!! Form::close() !!}           
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>        
    </div>
</div>
@stop
