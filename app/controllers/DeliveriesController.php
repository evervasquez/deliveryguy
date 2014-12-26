<?php
use delivery\Delivery\DeliveryRepositorie;

class DeliveriesController extends \BaseController
{
    protected $deliveryRepo;

    function __construct(DeliveryRepositorie $deliveryRepo)
    {
        $this->deliveryRepo = $deliveryRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /deliveries
     *
     * @return Response
     */
    public function index()
    {
        return View::make('deliveries/index');
    }

    /**
     * Show the form for creating a new resource.
     * GET /deliveries/create
     *
     * @return Response
     */
    public function create()
    {
        $companies['companies'] = $this->deliveryRepo->storeCompany();
        $companies['customers'] = $this->deliveryRepo->storeCustomers();
        return View::make('deliveries/create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     * POST /deliveries
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $message = $this->deliveryRepo->create($data);
        $this->sendPush($message,$data['status']);
        return Redirect::route('deliveries')->with('message','successful registration of the delivery');
    }

    /**
     * Display the specified resource.
     * GET /deliveries/{id}
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
     * GET /deliveries/{id}/edit
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
     * PUT /deliveries/{id}
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
     * DELETE /deliveries/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAll()
    {
        return $this->deliveryRepo->getAll();
    }
}