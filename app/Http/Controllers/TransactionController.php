<?php

namespace App\Http\Controllers;

use App\Domain\User\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function showTransferForm()
    {
        return view('transfer');
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'receiver_email' => 'required|email',
            'amount' => 'required|numeric|min:100',
        ]);

        $sender = Auth::user();
        $receiverEmail = $request->input('receiver_email');
        $amount = $request->input('amount');

        try {
            $this->transactionService->transferMoney($sender->id, $receiverEmail, $amount);
            return redirect()->route('home')->with('success', 'Transfer completed successfully');
        } catch (\Exception $e) {
            return redirect()->route('transfer')->with('error', $e->getMessage());
        }
    }

    public function transactions()
    {
        $userId = Auth::id();
        $transactions = $this->transactionService->getTransactionsByUser($userId);

        return view('transactions', compact('transactions'));
    }
}
