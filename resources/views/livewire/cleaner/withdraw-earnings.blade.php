<div style="width:100%;display:flex;flex-direction:column;align-items:center;padding:2rem 0;">
    <div style="width:100%;max-width:500px;padding:2rem;background:#fff;border:2px solid #333;border-radius:1rem;box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h2 style="margin-bottom:1.5rem;font-size:2rem;font-weight:bold;text-align:center;color:#222;">Withdraw Earnings</h2>
        <div style="margin-bottom:1rem;font-weight:600;color:#222;">
            <strong>Available Balance:</strong> ${{ number_format($balance, 2) }}
        </div>
        @if (session()->has('success'))
            <div style="margin-bottom:1rem;padding:0.75rem;border-radius:0.5rem;background:#d1fae5;color:#065f46;border:1px solid #10b981;">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div style="margin-bottom:1rem;padding:0.75rem;border-radius:0.5rem;background:#fee2e2;color:#991b1b;border:1px solid #ef4444;">{{ session('error') }}</div>
        @endif
        <form wire:submit="submitWithdrawal" style="display:flex;flex-direction:column;gap:1.25rem;">
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Amount</label>
                <input type="number" min="1" step="0.01" wire:model="amount" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                @error('amount') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Withdrawal Method</label>
                <select wire:model.live="method" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                    <option value="">-- Select Method --</option>
                    @foreach($methods as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('method') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            @if($method === 'cash_app')
                <div>
                    <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Cash App Tag</label>
                    <input type="text" wire:model="details.cash_tag" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                    @error('details.cash_tag') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
                </div>
            @elseif($method === 'zelle')
                <div>
                    <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Zelle Email</label>
                    <input type="email" wire:model="details.zelle_email" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                    @error('details.zelle_email') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
                </div>
            @elseif($method === 'venmo')
                <div>
                    <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Venmo Username</label>
                    <input type="text" wire:model="details.venmo_username" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                    @error('details.venmo_username') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
                </div>
            @elseif($method === 'check')
                <div>
                    <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Mailing Address</label>
                    <input type="text" wire:model="details.address" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                    @error('details.address') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
                </div>
            @endif
            <button type="submit" style="width:100%;padding:0.9rem 0;background:#2563eb;color:#fff;border-radius:0.5rem;font-weight:600;font-size:1rem;border:none;cursor:pointer;">Submit Withdrawal</button>
        </form>
    </div>
</div>
