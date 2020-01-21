<!-- Nomcat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomcat', 'Nomcat:') !!}
    {!! Form::text('nomcat', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagecat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagecat', 'Imagecat:') !!}
    {!! Form::file('imagecat', null, ['class' => 'form-control','placeholder'=>'']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
