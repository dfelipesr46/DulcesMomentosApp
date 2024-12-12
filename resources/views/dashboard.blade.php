<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full table-auto border-collapse shadow rounded-lg overflow-hidden">
                        <thead class="bg-gray-700 text-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold">#</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Cliente</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Estado</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Precio Total</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Fecha de Entrega</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $order->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $order->customer->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $order->status->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y H:i') : 'Sin asignar' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($orders->isEmpty())
                        <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">No hay pedidos disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
