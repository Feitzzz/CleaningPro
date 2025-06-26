<?php

namespace App\Livewire\Recruiter;

use Livewire\Component;
use App\Models\BusinessJob;
use Illuminate\Support\Facades\Auth;

class JobManager extends Component
{
    public $title;
    public $description;
    public $location;
    public $scheduled_at;
    public $jobs;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'nullable|string|max:255',
        'scheduled_at' => 'nullable|date',
    ];

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

    public function createJob()
    {
        $this->validate();
        $recruiter = Auth::user()->recruiter;
        if (!$recruiter) {
            session()->flash('error', 'You are not registered as a recruiter.');
            return;
        }
        BusinessJob::create([
            'recruiter_id' => $recruiter->id,
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'scheduled_at' => $this->scheduled_at,
        ]);
        $this->reset(['title', 'description', 'location', 'scheduled_at']);
        $this->loadJobs();
        session()->flash('success', 'Job created successfully!');
    }

    public function render()
    {
        return view('livewire.recruiter.job-manager');
    }
}
