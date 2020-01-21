<!-- Nomprod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomprod', 'Nomprod:') !!}
    {!! Form::text('nomprod', null, ['class' => 'form-control']) !!}
</div>

<!-- Imageprod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imageprod', 'Imageprod:') !!}
    {!! Form::file('imageprod', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', 'Prix:') !!}
    {!! Form::text('prix', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', 'Quantite:') !!}
    {!! Form::text('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Cat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cat', 'Id Cat:') !!}
    {!! Form::number('id_cat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produits.index') !!}" class="btn btn-default">Cancel</a>
</div>
