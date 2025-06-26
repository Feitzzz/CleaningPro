<?php

namespace App\Livewire\Recruiter;

use Livewire\Component;
use App\Models\BusinessJob;
use App\Models\Cleaner;
use Illuminate\Support\Facades\Auth;

class AssignJob extends Component
{
    public $selectedJobId;
    public $search = '';
    public $jobs = [];
    public $message = null;
    public $messageType = null;

    public function mount()
    {
        $this->loadJobs();
    }

    public function loadJobs()
    {
        $this->jobs = BusinessJob::where('recruiter_id', Auth::user()->recruiter->id ?? null)
            ->orderByDesc('created_at')
            ->get();
    }

    public function assignJobToCleaner($cleanerId)
    {
        $job = BusinessJob::find($this->selectedJobId);
        $cleaner = Cleaner::find($cleanerId);
        if (!$job || !$cleaner) {
            $this->message = 'Invalid job or cleaner.';
            $this->messageType = 'danger';
            return;
        }
        // Prevent duplicate assignment
        if ($job->cleaners()->where('cleaner_id', $cleanerId)->exists()) {
            $this->message = 'Cleaner already assigned to this job.';
            $this->messageType = 'warning';
            return;
        }
        $job->cleaners()->attach($cleanerId, ['assigned_at' => now(), 'status' => 'assigned']);
        $this->message = 'Job assigned to cleaner successfully!';
        $this->messageType = 'success';
    }

    public function render()
    {
        $cleaners = Cleaner::with('user')
            ->when($this->search, function($query) {
                $query->whereHas('user', function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%');
                });
            })
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();
        return view('livewire.recruiter.assign-job', [
            'cleaners' => $cleaners,
        ]);
    }
}
