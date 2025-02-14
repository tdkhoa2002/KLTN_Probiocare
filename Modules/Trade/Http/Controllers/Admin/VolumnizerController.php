<?php

namespace Modules\Trade\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Trade\Entities\Volumnizer;
use Modules\Trade\Http\Requests\CreateVolumnizerRequest;
use Modules\Trade\Http\Requests\UpdateVolumnizerRequest;
use Modules\Trade\Repositories\VolumnizerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class VolumnizerController extends AdminBaseController
{
    /**
     * @var VolumnizerRepository
     */
    private $volumnizer;

    public function __construct(VolumnizerRepository $volumnizer)
    {
        parent::__construct();

        $this->volumnizer = $volumnizer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$volumnizers = $this->volumnizer->all();

        return view('trade::admin.volumnizers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('trade::admin.volumnizers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateVolumnizerRequest $request
     * @return Response
     */
    public function store(CreateVolumnizerRequest $request)
    {
        $this->volumnizer->create($request->all());

        return redirect()->route('admin.trade.volumnizer.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('trade::volumnizers.title.volumnizers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Volumnizer $volumnizer
     * @return Response
     */
    public function edit(Volumnizer $volumnizer)
    {
        return view('trade::admin.volumnizers.edit', compact('volumnizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Volumnizer $volumnizer
     * @param  UpdateVolumnizerRequest $request
     * @return Response
     */
    public function update(Volumnizer $volumnizer, UpdateVolumnizerRequest $request)
    {
        $this->volumnizer->update($volumnizer, $request->all());

        return redirect()->route('admin.trade.volumnizer.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('trade::volumnizers.title.volumnizers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Volumnizer $volumnizer
     * @return Response
     */
    public function destroy(Volumnizer $volumnizer)
    {
        $this->volumnizer->destroy($volumnizer);

        return redirect()->route('admin.trade.volumnizer.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('trade::volumnizers.title.volumnizers')]));
    }
}
