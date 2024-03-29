<?php
use delivery\Delivery\DeliveryRepositorie;

class DeliveriesGuyApiController extends \BaseController
{
    protected $deliveryRepo;
    private static $STATUS_CONFIRMATION=1;
    function __construct(DeliveryRepositorie $deliveryRepo)
    {
        $this->deliveryRepo = $deliveryRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /deliveriesguyapi
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /deliveriesguyapi/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /deliveriesguyapi
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /deliveriesguyapi/{id}
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
     * GET /deliveriesguyapi/{id}/edit
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
     * PUT /deliveriesguyapi/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = Input::all();
        $response = $this->deliveryRepo->update($data,$id);
        if($data['status']==self::$STATUS_CONFIRMATION)
        {
            $this->sendPush($response,$data['status']);
        }
        return $response;
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /deliveriesguyapi/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}