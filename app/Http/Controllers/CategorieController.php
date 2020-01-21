<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Repositories\CategorieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Image;
use Flash;
use Response;

class CategorieController extends AppBaseController
{
    /** @var  CategorieRepository */
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepo)
    {
        $this->categorieRepository = $categorieRepo;
    }

    /**
     * Display a listing of the Categorie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categorieRepository->all();

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Categorie.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Categorie in storage.
     *
     * @param CreateCategorieRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorieRequest $request)
    {
       /* $input = $request->all();

        $categorie = $this->categorieRepository->create($input);

        Flash::success('Categorie saved successfully.');

        return redirect(route('categories.index'));*/
        $this->validate($request, [
            'nomcat' => 'required',
            'imagecat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            ]);
            
            $categorie = new Categorie ();

            $categorie->nomcat = $request->nomcat;
            $categorie->description = $request->description;

            if ($file = $request->hasFile('imagecat')){
            
                $file = $request->file('imagecat');

                $fileName = date('YmdHis').".".$file->getClientOriginalName();

                $destinationPath = 'catImages';
            

                $file->move($destinationPath, $fileName);
                
                $categorie->imagecat = $fileName;
            }
        $categorie->save();

        return redirect(route('categories.index'))
        ->with('imagecat',$fileName);
    
        
        
      
    }

    /**
     * Display the specified Categorie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('categorie', $categorie);
    }

    /**
     * Show the form for editing the specified Categorie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('categorie', $categorie);
    }

    /**
     * Update the specified Categorie in storage.
     *
     * @param int $id
     * @param UpdateCategorieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorieRequest $request)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            return $this->sendError('Categorie not found');
        }
        
        $categorie->nomcat = $request->nomcat;
        $categorie->description = $request->description;

        if ($file = $request->hasFile('imagecat')){
        
            $file = $request->file('imagecat');

            $fileName = date('YmdHis').".".$file->getClientOriginalName();

            $destinationPath = 'catImages';
        

            $file->move($destinationPath, $fileName);
            
            $categorie->imagecat = $fileName;
        }
    $categorie->update();

    Flash::success('Categorie updated successfully.');
    return redirect(route('categories.index'));
    
       
    }

    /**
     * Remove the specified Categorie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        $this->categorieRepository->delete($id);

        Flash::success('Categorie deleted successfully.');

        return redirect(route('categories.index'));
    }
}
