<?php
use domain\delivery\User\UserRepository;
use Illuminate\Events\Dispatcher;
use domain\delivery\Employee\EmployeeRepositorie;
use domain\delivery\User\UserManager;

class UsersController extends BaseController
{
    private $userRepo;
    private $events;
    private $employeeRepo;
    private $manager;

    function __construct(
        UserRepository $userRepo,
        EmployeeRepositorie $employeeRepo,
        Dispatcher $events, UserManager $manager)
    {
        $this->userRepo = $userRepo;
        $this->events = $events;
        $this->employeeRepo = $employeeRepo;
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $data = Input::all();
        if ($this->manager->passes()) {
            $this->userRepo->create($data);
            return Redirect::action('sign-in')->with('message', 'registration was successful, please login to your account to complete your data.');
        } else {
            return \Redirect::back()->withInput()->withErrors($this->manager->getErrors());
        }
    }

    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /users/{id}
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
     * GET /users/{id}/edit
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
     * PUT /users/{id}
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
     * DELETE /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}