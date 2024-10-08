<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class ExcelImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $expectedHeaders = ['id', 'external_id', 'user', 'charge', 'cost', 'link', 'start_count', 'quantity', 'service_id', 'service', 'status', 'remains', 'created', 'provider', 'mode'];

        // Validate headers
        $actualHeaders = $rows->first()->keys()->toArray();

        // Convert both expected and actual headers to lowercase for case-insensitive comparison
        $expectedHeadersLower = array_map('strtolower', $expectedHeaders);
        $actualHeadersLower = array_map('strtolower', $actualHeaders);

        // Sort both arrays to make the comparison order-insensitive
        sort($expectedHeadersLower);
        sort($actualHeadersLower);

        if ($actualHeadersLower !== $expectedHeadersLower) {
            throw new \Exception('Headers do not match the expected format');
        }

        // Perform calculations
        $totalCharge = $rows->sum('charge');
        $totalCost = $rows->sum('cost');
        $totalQuantity = $rows->sum('quantity');
        $averageCostPerQuantity = $totalQuantity ? $totalCost / $totalQuantity : 0;

        // Additional calculations based on the screenshots
        $activeUsers = $rows->unique('user')->count();
        $orders = $rows->count();
        $remains = $rows->sum('remains');
        $revenue = $totalCharge;
        $cost = $totalCost;

        // Calculate number of unique services and providers
        $numServices = $rows->unique('service')->count();
        $numProviders = $rows->unique('provider')->count();

        // Calculate status share
        $statusShare = $rows->groupBy('status')->map(function ($statusRows) {
            return $statusRows->count();
        });

        // Group by service for service by orders
        $serviceByOrders = $rows->groupBy('service')->map(function ($serviceRows) {
            return $serviceRows->count();
        })->sortDesc()->take(10);

        // Group by provider for provider by orders
        $providerByOrders = $rows->groupBy('provider')->map(function ($providerRows) {
            return $providerRows->count();
        })->sortDesc()->take(10);

        // Group by user for top users by spend and orders
        $topUsersBySpend = $rows->groupBy('user')->map(function ($userRows) {
            return $userRows->sum('charge');
        })->sortDesc()->take(10);

        $topUsersByOrders = $rows->groupBy('user')->map(function ($userRows) {
            return $userRows->count();
        })->sortDesc()->take(10);

        // Store results in session
        Session::put('excel_data', [
            'total_charge' => $totalCharge,
            'total_cost' => $totalCost,
            'total_quantity' => $totalQuantity,
            'average_cost_per_quantity' => $averageCostPerQuantity,
            'active_users' => $activeUsers,
            'orders' => $orders,
            'remains' => $remains,
            'revenue' => $revenue,
            'cost' => $cost,
            'num_services' => $numServices,
            'num_providers' => $numProviders,
            'status_share' => $statusShare->toArray(),
            'service_by_orders' => $serviceByOrders->toArray(),
            'provider_by_orders' => $providerByOrders->toArray(),
            'top_users_by_spend' => $topUsersBySpend->toArray(),
            'top_users_by_orders' => $topUsersByOrders->toArray(),
        ]);
    }
}
