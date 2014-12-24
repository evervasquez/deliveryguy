<?php
use delivery\Employee\EmployeeRepositorie;

class EmployeesGuyApiController extends \BaseController {
    protected $employeeRepo;

    function __construct(EmployeeRepositorie $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }
	/**
	 * Display a listing of the resource.
	 * GET /employeesguyapi
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employeesguyapi/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employeesguyapi
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = json_decode(file_get_contents('php://input'), true);
        $datos = array(
            "Result" => "OK"
        );
        print_r($data);
        //return $this->employeeRepo->create($data);
	}

	/**
	 * Display the specified resource.
	 * GET /employeesguyapi/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /employeesguyapi/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /employeesguyapi/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /employeesguyapi/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}