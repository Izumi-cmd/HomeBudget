<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeBudget;
use App\Services\HomeBudgetService;
use App\Http\Requests\HomebudgetRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
class HomebudgetController extends Controller
{
    private $homeBudgetService;

    public function __construct(HomeBudgetService $homeBudgetService)
    {
        $this->homeBudgetService = $homeBudgetService;
    }

    /**
     * 支出一覧を表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $categories = $this->homeBudgetService->getCategories();
        $homeBudgets = $this->homeBudgetService->getHomeBudgets();
        // dd($homeBudgets);
        return view('homebudget.index', compact('categories', 'homeBudgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomebudgetRequest $request)
    {
        // dd($request->validated());
        $this->homeBudgetService->createHomeBudgets($request->validated());

        return redirect()->route('homebudget.index')->with('success', '支出を追加しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
