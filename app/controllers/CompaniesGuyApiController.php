<?php
use delivery\Company\CompanyRepositorie;

class CompaniesGuyApiController extends \BaseController
{
    protected $companyRepo;

    public function __construct(CompanyRepositorie $repositorie)
    {
        $this->companyRepo = $repositorie;
    }

    /**
     * Display a listing of the resource.
     * GET /companiesguyapi
     *
     * @return Response
     */
    public function index()
    {
        return $this->companyRepo->getAll();
    }

    /**
     * Show the form for creating a new resource.
     * GET /companiesguyapi/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /companiesguyapi
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /companiesguyapi/{id}
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
     * GET /companiesguyapi/{id}/edit
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
     * PUT /companiesguyapi/{id}
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
     * DELETE /companiesguyapi/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}