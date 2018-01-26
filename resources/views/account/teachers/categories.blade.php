
{{ Form::open(array('url' => 'account/categories/create')) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                {{ Form::label('categories_id', 'Catégories') }}
                {{ Form::select('categories_id', $categories, null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('url', 'Id video youtube') }}<small> ( Xb54sd45 )</small>
                {{ Form::text('url', null,array('class'=>'form-control')) }}
            </div>

            <div class="form-group pull-right">
                {{ Form::submit('Sauvegarder', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>
{{ Form::close() }}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

