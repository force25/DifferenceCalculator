<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DateCalculatorServices;

class CalculatorsController extends Controller
{

    protected $DateCalculatorServices;

    public function __construct(DateCalculatorServices $DateCalculatorServices)
    {
        $this->DateCalculatorServices = $DateCalculatorServices;
    }
    public function index()
    {
        return view('Calculator.index');
    }

    
    public function differenceCalculatorGet(){
        return view('Calculator.differenceCalculatorGet');
        ##return view('Calculator.differenceCalculator');
    }
    public function differenceCalculatorPost(Request $request){
        $this->DateCalculatorServices->CalculateDateDifference($request);
        return redirect('/differenceCalculatorGet');
    }
    #example passing value to blade
   /* public function index()
    {
        $title = 'Welcome to difference calculator'
        return view('Calculator.index',compact('title'));
        return view('Calculator.index')->with('title',$title);
    }*/
}
