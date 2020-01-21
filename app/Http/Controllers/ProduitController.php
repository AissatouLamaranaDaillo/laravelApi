<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Repositories\ProduitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Produit;
use Flash;
use Response;
use Image;

class ProduitController extends AppBaseController
{
    /** @var  ProduitRepository */
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $produits = $this->produitRepository->all();

        return view('produits.index')
            ->with('produits', $produits);
    }

    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created Produit in storage.
     *
     * @param CreateProduitRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitRequest $request)
    {
       /* $input = $request->all();

        $produit = $this->produitRepository->create($input);

        Flash::success('Produit saved successfully.');

        return redirect(route('produits.index'));*/

 $this->validate($request, [
            'nomprod' => 'required',
            'imageprod' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required',
            'quantite' => 'required',
            'id_cat' => 'required',
           ]);
           
           $produit = new Produit ();
       
           $produit->nomprod = $request->nomprod;
           $produit->prix = $request->prix;
           $produit->quantite = $request->quantite;
           $produit->id_cat = $request->id_cat;

           if ($file = $request->hasFile('imageprod')){
           
               $file = $request->file('imageprod');
               
               $fileName = $file->getClientOriginalName();
               
       
               $fileName = date('YmdHis').".".$file->getClientOriginalName();

               $destinationPath = 'prodImages';
             
       
               $file->move($destinationPath, $fileName);
               
               $produit->imageprod = $fileName;
           }
                $produit->save();
           
                return redirect(route('produits.index'))
                ->with('imageprod',$fileName);
        
    }

    /**
     * Display the specified Produit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        return view('produits.show')->with('produit', $produit);
    }

    /**
     * Show the form for editing the specified Produit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
       $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        return view('produits.edit')->with('produit', $produit);
            
    }

    /**
     * Update the specified Produit in storage.
     *
     * @param int $id
     * @param UpdateProduitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitRequest $request)
    {
      
        $produit = $this->produitRepository->find($id);

        
           
    
            if (empty($produit)) {
                return $this->sendError('Produit not found');
            }
            $produit->nomprod = $request->nomprod;
            $produit->prix = $request->prix;
            $produit->quantite = $request->quantite;
            $produit->id_cat = $request->id_cat;
            
           // $cars = array($request->nomprod, $request->prix,  $request->quantite, $request->id_cat);
    
            if ($file = $request->hasFile('imageprod')){
    
                $file = $request->file('imageprod'); 
    
            $fileName = $file->getClientOriginalName();
        
              
           $fileName = date('YmdHis').".".$file->getClientOriginalName();
    
            $destinationPath ='prodImages'; 
    
            $file->move($destinationPath, $fileName);
    
    
    
              $produit->imageprod = $fileName;
            }
                   
    
            $produit->update();

        Flash::success('Produit updated successfully.');

        return redirect(route('produits.index'));

    }

    /**
     * Remove the specified Produit from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        $this->produitRepository->delete($id);

        Flash::success('Produit deleted successfully.');

        return redirect(route('produits.index'));
    }
}
