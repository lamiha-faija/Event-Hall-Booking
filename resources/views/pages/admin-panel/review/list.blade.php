
@extends('layouts.admin')

@section('title', 'Customer Reviews | Hallora')

@section('content')
<div class="mb-8">
    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Customer Feedback</p>
    <h1 class="mt-2 text-3xl font-bold text-slate-900">Customer Reviews</h1>
    <p class="mt-2 text-slate-500">Read and manage feedback submitted by customers.</p>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[750px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-6 py-4">Review ID</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Hall</th>
                    <th class="px-6 py-4">Rating</th>
                    <th class="px-6 py-4">Review</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($reviews as $review)
                    <tr class="align-top hover:bg-slate-50">
                        <td class="px-6 py-4 font-medium">{{ $review->id }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $review->booking->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $review->booking->hall->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if($review->rating)
                                <span class="font-semibold text-amber-600">★ {{ $review->rating }}/5</span>
                            @else
                                <span class="text-slate-400">Not given</span>
                            @endif
                        </td>
                        <td class="max-w-sm px-6 py-4 text-slate-600">{{ $review->review ?? 'No written review' }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('deleteReview', $review->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this review?')">
                                @csrf
                                <button type="submit" class="rounded-lg bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">No reviews available yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
