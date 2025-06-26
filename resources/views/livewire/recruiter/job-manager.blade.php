<div style="width:100%;display:flex;flex-direction:column;gap:2rem;align-items:center;padding:2rem 0;">
    <!-- Job Creation Form -->
    <div style="width:100%;max-width:700px;padding:2rem;background:#fff;border:2px solid #333;border-radius:1rem;box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h2 style="margin-bottom:1.5rem;font-size:2rem;font-weight:bold;text-align:center;color:#222;">Create New Job</h2>
        @if (session()->has('success'))
            <div style="margin-bottom:1rem;padding:0.75rem;border-radius:0.5rem;background:#d1fae5;color:#065f46;border:1px solid #10b981;">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div style="margin-bottom:1rem;padding:0.75rem;border-radius:0.5rem;background:#fee2e2;color:#991b1b;border:1px solid #ef4444;">{{ session('error') }}</div>
        @endif
        <form wire:submit="createJob" style="display:flex;flex-direction:column;gap:1.25rem;">
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Title</label>
                <input type="text" wire:model="title" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;" required>
                @error('title') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Description</label>
                <textarea wire:model="description" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;"></textarea>
                @error('description') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Location</label>
                <input type="text" wire:model="location" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;">
                @error('location') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display:block;margin-bottom:0.25rem;font-weight:600;color:#222;">Scheduled At</label>
                <input type="datetime-local" wire:model="scheduled_at" style="width:100%;padding:0.75rem;border:1.5px solid #888;border-radius:0.5rem;background:#f9fafb;color:#222;">
                @error('scheduled_at') <span style="color:#dc2626;font-size:0.85rem;">{{ $message }}</span> @enderror
            </div>
            <button type="submit" style="width:100%;padding:0.9rem 0;background:#2563eb;color:#fff;border-radius:0.5rem;font-weight:600;font-size:1rem;border:none;cursor:pointer;">Create Job</button>
        </form>
    </div>
    <!-- Job List -->
    <div style="width:100%;max-width:900px;padding:2rem;background:#fff;border:2px solid #333;border-radius:1rem;box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h3 style="margin-bottom:1rem;font-size:1.25rem;font-weight:bold;color:#222;">Your Jobs</h3>
        <div style="overflow-x:auto;">
            <table style="width:100%;background:#fff;border-radius:0.5rem;border-collapse:collapse;">
                <thead style="background:#f3f4f6;">
                    <tr>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Title</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Description</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Location</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Scheduled At</th>
                        <th style="padding:0.75rem 1rem;border-bottom:2px solid #e5e7eb;color:#222;">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $job->title }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $job->description }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $job->location }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $job->scheduled_at }}</td>
                            <td style="padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;color:#222;">{{ $job->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding:0.75rem 1rem;text-align:center;color:#6b7280;">No jobs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
