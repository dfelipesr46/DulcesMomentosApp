<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <!-- Filtros -->
                <form method="GET" action="{{ route('orders.index') }}" class="mb-4">
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <input type="text" name="customer" placeholder="Customer Name" 
                               value="{{ request('customer') }}"
                               class="form-input rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                        
                        <input type="text" name="status" placeholder="Order Status" 
                               value="{{ request('status') }}"
                               class="form-input rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                        
                        <input type="date" name="from_date" placeholder="From Date" 
                               value="{{ request('from_date') }}"
                               class="form-input rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                        
                        <input type="date" name="to_date" placeholder="To Date" 
                               value="{{ request('to_date') }}"
                               class="form-input rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn-primary">Filter</button>
                        <a href="{{ route('orders.index') }}" class="btn-secondary">Clear</a>
                    </div>
                </form>

                <!-- Tabla -->
                <table class="w-full table-auto border-collapse rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">Order ID</th>
                            <th class="px-4 py-2">Customer</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Total Price</th>
                            <th class="px-4 py-2">Delivery Date</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2">{{ $order->id }}</td>
                                <td class="px-4 py-2">{{ $order->customer->name }}</td>
                                <td class="px-4 py-2">{{ $order->status->name }}</td>
                                <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                                <td class="px-4 py-2">{{ $order->delivery_date }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn-primary">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-500">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
