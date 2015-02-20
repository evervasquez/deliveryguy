<?php
use domain\delivery\Employee\EmployeeRepositorie;
use Illuminate\Events\Dispatcher;
use domain\delivery\Employee\EmployeeManager;
use domain\social\GoogleManager;
use domain\social\FacebookManager;

class EmployeesController extends \BaseController
{
    protected $employeeRepo;
    protected $manager;
    protected $events;
    protected $google;
    protected $facebook;

    function __construct(
        EmployeeRepositorie $employeeRepo,
        EmployeeManager $manage,
        Dispatcher $events,
        GoogleManager $google,
        FacebookManager $facebook)
    {
        $this->employeeRepo = $employeeRepo;
        $this->manager = $manage;
        $this->events = $events;
        $this->google=$google;
        $this->facebook = $facebook;
    }


    /**
     * Display a listing of the resource.
     * GET /employees
     *
     * @return Response
     */
    public function index()
    {
        return View::make('employees/index');
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /employees/create
     *
     * @return Response
     */
    public function create()
    {
        if ($this->manager->passes()) {
            $employee = $this->employeeRepo->create(Input::except('_token'));
            $this->events->fire('employee.create', array($employee));
            return \View::make('signup-confirmation');
        } else {
            return \Redirect::back()->withInput()->withErrors($this->manager->getErrors());
        }
    }

    public function createEmployeeGoogle()
    {
        $this->employeeRepo->loginWithGoogle();
        $this->events->fire('employee.create', array($this->employeeRepo->findMaxId()));
        return \View::make('signup-confirmation');
    }

    public function authSocial($provider)
    {
        $user = $this->facebook->loginWithFacebook($provider);
        $this->employeeRepo->create($user);
    }

    /**
     * Store a newly created resource in storage.
     * POST /employees
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /employees/{id}
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
     * GET /employees/{id}/edit
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
     * PUT /employees/{id}
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
     * DELETE /employees/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatedRegId()
    {

    }

}