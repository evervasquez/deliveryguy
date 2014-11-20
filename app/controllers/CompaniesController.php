<?php
use delivery\Company\CompanyRepositorie;

class CompaniesController extends \BaseController
{
    protected $companyRepo;

    public function __construct(CompanyRepositorie $companyRepositorie)
    {
        $this->companyRepo = $companyRepositorie;
    }

    /**
     * Display a listing of the resource.
     * GET /companies
     *
     * @return Response
     */
    public function index()
    {
        return View::make('companies/index');
    }

    /**
     * Show the form for creating a new resource.
     * GET /companies/create
     *
     * @return Response
     */
    public function create()
    {
        $data = Input::all();
        $this->companyRepo->create($data);
        //if ($this->companyRepo->create($data)) {
         return Redirect::route('companies')->with('message','successful registration of the company');
        //}else{

       // }
    }

    /**
     * Store a newly created resource in storage.
     * POST /companies
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /companies/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}