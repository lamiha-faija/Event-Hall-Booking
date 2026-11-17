
@extends('layouts.admin')

@section('title', 'Customers | Hallora')

@section('content')
<div class="mb-8">
    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Customer Management</p>
    <h1 class="mt-2 text-3xl font-bold text-slate-900">Registered Customers</h1>
    <p class="mt-2 text-slate-500">View the customers registered on Hallora.</p>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[700px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Phone Number</th>
                    <th class="px-6 py-4">Registered At</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($customers as $customer)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">{{ $customer->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="grid h-10 w-10 place-items-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-slate-900">{{ $customer->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $customer->email }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $customer->phone_number }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $customer->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">No customers registered yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
