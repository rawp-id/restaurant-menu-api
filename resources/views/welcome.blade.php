<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HungryHub API - Placement Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#dc2626', // Red color fitting for a food/restaurant app
                            hover: '#b91c1c',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans selection:bg-brand selection:text-white pb-12">

    <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div>
                    <h1 class="text-xl font-bold text-slate-900 leading-tight">HungryHub API</h1>
                    <p class="text-xs text-slate-500 font-medium">Placement Test Service</p>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="text-center mb-14">
            <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                Restaurant & Menu Management API
            </h2>
            <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
                Welcome to the core backend service. This API provides programmatic access to manage restaurants and their associated menu items efficiently.
            </p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="https://web.hungryhub.com/en/bangkok/web" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-brand hover:bg-brand-hover shadow-sm transition-all duration-200 hover:-translate-y-0.5">
                    HungryHub
                </a>
            </div>
        </div>

        <div class="mb-12">
            <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                Data Models
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-slate-50 px-5 py-3 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 text-lg">Restaurant</h4>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-3 font-mono text-sm">
                            <li><span class="text-blue-600 font-semibold">name</span> <span class="text-slate-500">(string, required)</span></li>
                            <li><span class="text-blue-600 font-semibold">address</span> <span class="text-slate-500">(string, required)</span></li>
                            <li><span class="text-blue-600 font-semibold">phone</span> <span class="text-slate-500">(string)</span></li>
                            <li><span class="text-blue-600 font-semibold">opening_hours</span> <span class="text-slate-500">(string)</span></li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-slate-50 px-5 py-3 border-b border-slate-200 flex justify-between items-center">
                        <h4 class="font-bold text-slate-800 text-lg">Menu Item</h4>
                        <span class="text-xs font-semibold bg-slate-200 text-slate-600 px-2 py-1 rounded">Belongs to Restaurant</span>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-3 font-mono text-sm">
                            <li><span class="text-blue-600 font-semibold">name</span> <span class="text-slate-500">(string, required)</span></li>
                            <li><span class="text-blue-600 font-semibold">description</span> <span class="text-slate-500">(string)</span></li>
                            <li><span class="text-blue-600 font-semibold">price</span> <span class="text-slate-500">(decimal, required)</span></li>
                            <li><span class="text-blue-600 font-semibold">category</span> <span class="text-slate-500">(string, e.g. "appetizer", "main")</span></li>
                            <li><span class="text-blue-600 font-semibold">is_available</span> <span class="text-slate-500">(boolean, default: true)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                API Endpoints
            </h3>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Method</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Endpoint</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Description</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-green-100 text-green-700">POST</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Create a restaurant</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-blue-100 text-blue-700">GET</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants</td>
                                <td class="px-6 py-4 text-sm text-slate-600">List all restaurants</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-blue-100 text-blue-700">GET</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants/:id</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Get restaurant detail (include menu items)</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-orange-100 text-orange-700">PUT</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants/:id</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Update a restaurant</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-red-100 text-red-700">DELETE</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants/:id</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Delete a restaurant</td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors border-t-2 border-slate-100">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-green-100 text-green-700">POST</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants/:id/menu_items</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Add a menu item</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-blue-100 text-blue-700">GET</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/restaurants/:id/menu_items</td>
                                <td class="px-6 py-4 text-sm text-slate-600">List menu items (support filter by category)</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-orange-100 text-orange-700">PUT</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/menu_items/:id</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Update a menu item</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2.5 py-1 text-xs font-bold rounded bg-red-100 text-red-700">DELETE</span></td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-700">/menu_items/:id</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Delete a menu item</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <footer class="mt-12 text-center text-sm text-slate-400">
        <p>Built for Placement Test Assessment &bull; Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
    </footer>

</body>
</html>