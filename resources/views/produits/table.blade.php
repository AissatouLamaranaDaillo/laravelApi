<div class="table-responsive">
    <table class="table" id="produits-table">
        <thead>
            <tr>
                <th>Nomprod</th>
        <th>Imageprod</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Id Cat</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produits as $produit)
            <tr>
                <td>{!! $produit->nomprod !!}</td>
  
             <td> <img src="{{'prodImages/' . $produit->imageprod }}" alt=""  class="" height="50" witdh="50"></td>
            <td>{!! $produit->prix !!}</td>
            <td>{!! $produit->quantite !!}</td>
            <td>{!! $produit->id_cat !!}</td>
                <td>
                    {!! Form::open(['route' => ['produits.destroy', $produit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('produits.show', [$produit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('produits.edit', [$produit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
