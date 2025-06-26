<div style="width:100%;display:flex;flex-direction:column;gap:2rem;align-items:center;padding:2rem 0;">
    <div style="width:100%;max-width:700px;padding:2rem;background:#fff;border:2px solid #333;border-radius:1rem;box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h2 style="margin-bottom:1.5rem;font-size:2rem;font-weight:bold;text-align:center;color:#222;">Assign Job to Cleaner</h2>
        @if ($message)
            <div style="margin-bottom:1rem;padding:0.75rem;border-radius:0.5rem;{{ $messageType === 'success' ? 'background:#d1fae5;color:#065f46;border:1px solid #10b981;' : ($messageType === 'warning' ? 'background:#fef9c3;color:#92400e;border:1px solid #facc15;' : 'background:#fee2e2;color:#991b1b;border:1px solid #ef4444;') }}">{{ $message }}</div>
        @endif
        <div style="margin-bottom:2rem;">
            <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Select Job</label>
            <select wire:model.live="selectedJobId" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;">
                <option value="">-- Select a Job --</option>
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}">{{ $job->title }} ({{ $job->location }})</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom:2rem;">
            <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Search Cleaners</label>
            <input type="text" wire:model.live.debounce.500ms="search" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" placeholder="Name or Email">
        </div>
        <h4 style="margin-bottom:0.75rem;font-weight:600;color:#222;">Cleaners</h4>
        <div style="overflow-x:auto;">
            <table style="width:100%;background:#fff;border-radius:0.5rem;border-collapse:collapse;">
                <thead style="background:#f3f4f6;">
                    <tr>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Name</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Email</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Phone</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cleaners as $cleaner)
                        <tr>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $cleaner->user->name ?? '' }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $cleaner->user->email ?? '' }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $cleaner->phone }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;">
                                <button style="padding:0.5rem 1.2rem;background:#2563eb;color:#fff;border-radius:0.5rem;font-weight:600;font-size:1rem;border:none;cursor:pointer;" wire:click="assignJobToCleaner({{ $cleaner->id }})" @if(!$selectedJobId) disabled @endif>
                                    Assign
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding:0.75rem 1rem;text-align:center;color:#6b7280;">No cleaners found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
