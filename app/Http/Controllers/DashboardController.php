<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $today = Carbon::now();

        // dd($today->subMonth(5)->format('M'));
        $lastSixMonths = $this->lastSixMonths();
        $annualSales = $this->getAnnualSales();
        $monthlyIncome = $this->getMonthlyIncome();
        $monthlyExpense = $this->getMonthlyExpense();
        $monthlyBalance = $this->getMonthlyBalance();
        $sales = $this->sales();
        $balances = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->sum('balance');
        $expenses = $this->expenses();
        // dd($this->getMonthlyBalance());
        $annualExpenses = $this->getAnnualExpense();
        return view('dashboard.index', compact('annualSales', 'annualExpenses', 'lastSixMonths', 'monthlyIncome', 'monthlyExpense', 'monthlyBalance', 'sales', 'balances', 'expenses'));
    }

    function expenses(){
        $sale = 0;
        foreach ($this->lastSixMonthsIndexes() as $key => $index) {
            $sale += Expense::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('amount');
        }

        return $sale;
    }

    function sales(){
        $sale = 0;
        foreach ($this->lastSixMonthsIndexes() as $key => $index) {
            $sale += Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('total_amount') - Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('balance');
        }

        return $sale;
    }

    function lastSixMonths()
    {
        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            array_push($months, strtoupper(Carbon::now()->subMonth($i)->format('M')));
        }

        return $months;
    }

    function lastSixMonthsIndexes()
    {
        $indexes = [];

        for ($i = 5; $i >= 0; $i--) {
            array_push($indexes, Carbon::now()->subMonth($i)->month);
        }

        return $indexes;
    }


    function getMonthlyIncome()
    {
        $income = [];

        // $lastSixMonthindex = Carbon::now->subMonths(6)->month;

        foreach ($this->lastSixMonthsIndexes() as $key => $index) {
            $amount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('total_amount') - Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('balance');
            array_push($income, $amount);
        }

        return "[" . implode(',', $income) . "]";

    }
    
    function getMonthlyBalance()
    {
        $balance = [];

        // $lastSixMonthindex = Carbon::now->subMonths(6)->month;

        foreach ($this->lastSixMonthsIndexes() as $key => $index) {
            $amount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('balance');
            array_push($balance, $amount);
        }

        return "[" . implode(',', $balance) . "]";

    }

    function getMonthlyExpense()
    {
        $income = [];

        // $lastSixMonthindex = Carbon::now->subMonths(6)->month;

        foreach ($this->lastSixMonthsIndexes() as $key => $index) {
            $amount = Expense::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $index)->sum('amount');
            array_push($income, $amount);
        }

        return "[" . implode(',', $income) . "]";

    }

    function getAnnualSales()
    {
        $sales = [];

        foreach (range(1, 12) as $month) {
            $monthlySaleCount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $month)->count();
            array_push($sales, $monthlySaleCount);
        }

        return "[" . implode(',', $sales) . "]";
    }

    function getAnnualExpense()
    {
        $expenses = [];

        foreach (range(1, 12) as $month) {
            $monthlyExpenseCount = Expense::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $month)->count();
            array_push($expenses, $monthlyExpenseCount);
        }

        return "[" . implode(',', $expenses) . "]";
    }
}
