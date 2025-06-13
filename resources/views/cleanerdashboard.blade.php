<x-app-layout>
    <div class="flex flex-col gap-6 p-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Welcome, Cleaner</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Today's Job Card -->
            <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6 border border-neutral-200 dark:border-neutral-700">
                <h5 class="text-lg font-semibold mb-2">Today's Job</h5>
                <p><strong>Client:</strong> Mr. John Smith</p>
                <p><strong>Time:</strong> 2:00 PM</p>
                <p><strong>Location:</strong> 123 Main St</p>
                <p><strong>Type:</strong> Regular Cleaning</p>
                <div class="mt-3 flex gap-2">
                    <button class="btn btn-outline-success btn-sm">Start Job</button>
                    <button class="btn btn-outline-danger btn-sm">Cancel</button>
                </div>
            </div>
            <!-- Payment Summary Card -->
            <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6 border border-neutral-200 dark:border-neutral-700">
                <h5 class="text-lg font-semibold mb-2">Payment Summary</h5>
                <p><strong>Total Jobs This Month:</strong> 12</p>
                <p><strong>Total Earned:</strong> $780</p>
                <div class="mt-6">
                    <a href="{{ url('withdraw.html') }}" class="btn btn-outline-success">Withdraw Earnings</a>
                </div>
            </div>
        </div>
        <!-- My Jobs List -->
        <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6 border border-neutral-200 dark:border-neutral-700 mt-6" x-data="{ showModal: false }">
            <h2 class="text-xl font-semibold mb-4">My Jobs</h2>
            <ul class="divide-y divide-neutral-200 dark:divide-neutral-700">
                <li class="flex items-center justify-between py-3">
                    <span>June 10 - Deep Cleaning - 10:00 AM</span>
                    <button class="btn btn-outline-info btn-sm" @click="showModal = true">View Details</button>
                </li>
                <li class="flex items-center justify-between py-3">
                    <span>June 11 - Regular Cleaning - 10:00 AM</span>
                    <button class="btn btn-outline-info btn-sm" @click="showModal = true">View Details</button>
                </li>
                <li class="flex items-center justify-between py-3">
                    <span>June 12 - Deep Cleaning - 11:00 AM</span>
                    <button class="btn btn-outline-info btn-sm" @click="showModal = true">View Details</button>
                </li>
            </ul>
            <!-- Modal Example (replace with Livewire/Alpine modal as needed) -->
            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-lg font-semibold">Job Details</h5>
                        <button class="text-gray-500 hover:text-gray-700" @click="showModal = false">&times;</button>
                    </div>
                    <div>
                        <p><strong>Client Name:</strong> Mr. John Smith</p>
                        <p><strong>Phone:</strong> (123) 456-7890</p>
                        <p><strong>Address:</strong> 123 Main St, City, ZIP</p>
                        <p><strong>Type:</strong> Deep Cleaning</p>
                        <p><strong>Date & Time:</strong> June 10 - 10:00 AM</p>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button class="btn btn-secondary" @click="showModal = false">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 