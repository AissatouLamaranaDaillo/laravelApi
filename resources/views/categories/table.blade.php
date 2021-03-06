<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>Nomcat</th>
        <th>Imagecat</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $categorie)
            <tr>
                <td>{!! $categorie->nomcat !!}</td>
           <td> <img src="{{'catImages/' . $categorie->imagecat }}" 
           alt=""  class="" height="50" witdh="50"></td>
            <td>{!! $categorie->description !!}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy',  $categorie->id], 'method' => 'delete' ]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('categories.show', [$categorie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('categories.edit', [$categorie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
