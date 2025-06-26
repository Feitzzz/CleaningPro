<?php

namespace App\Livewire\Cleaner;

use Livewire\Component;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class WithdrawEarnings extends Component
{
    public $amount;
    public $method;
    public $details = [];
    public $methods = ['cash_app' => 'Cash App', 'zelle' => 'Zelle', 'venmo' => 'Venmo', 'check' => 'Check'];

    public function updatedMethod()
    {
        $this->details = [];
    }

    public function submitWithdrawal()
    {
        $this->validate($this->rules());
        $cleaner = Auth::user()->cleaner;
        if (!$cleaner) {
            session()->flash('error', 'You are not registered as a cleaner.');
            return;
        }
        Withdrawal::create([
            'cleaner_id' => $cleaner->id,
            'amount' => $this->amount,
            'method' => $this->method,
            'details' => $this->details,
            'status' => 'pending',
        ]);
        $this->reset(['amount', 'method', 'details']);
        session()->flash('success', 'Withdrawal request submitted!');
    }

    public function rules()
    {
        $rules = [
            'amount' => 'required|numeric|min:1',
            'method' => 'required|in:cash_app,zelle,venmo,check',
        ];
        switch ($this->method) {
            case 'cash_app':
                $rules['details.cash_tag'] = 'required|string';
                break;
            case 'zelle':
                $rules['details.zelle_email'] = 'required|email';
                break;
            case 'venmo':
                $rules['details.venmo_username'] = 'required|string';
                break;
            case 'check':
                $rules['details.address'] = 'required|string';
                break;
        }
        return $rules;
    }

    public function render()
    {
        // Placeholder for available balance
        $balance = 100.00;
        return view('livewire.cleaner.withdraw-earnings', [
            'balance' => $balance,
        ]);
    }
}
