<template>
    <AuthenticatedLayout>
        <div class="p-8 max-w-[768px] mx-auto h-full overflow-auto dark:text-gray-200">

            <body class="bg-gray-100 text-gray-900 dark:bg-slate-900 dark:text-gray-200">
                <div class="min-h-screen flex flex-col">
                    <!-- Header -->
                    <header class="bg-white shadow p-4 dark:bg-slate-900 dark:text-gray-200">
                        <div class="max-w-7xl mx-auto flex justify-between items-center">
                            <h1 class="text-2xl font-bold">Your Shop</h1>
                            <nav>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Home</a>
                                <a href="#" class="ml-4 text-gray-600 hover:text-gray-900">Products</a>
                                <a href="#" class="ml-4 text-gray-600 hover:text-gray-900">Cart</a>
                            </nav>
                        </div>
                    </header>

                    <!-- Main Content -->
                    <main class="flex-1 max-w-7xl mx-auto p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Shopping Cart -->
                            <section class="lg:col-span-2">
                                <h2 class="text-xl font-bold mb-4">Shopping Cart</h2>
                                <div class="bg-white p-4 rounded-lg shadow dark:bg-slate-900 dark:text-gray-200">
                                    <!-- Cart Item -->
                                    <div class="flex items-center mb-4">
                                        <img src="https://placehold.co/400" alt="Product Image" class="h-16 w-16 rounded">
                                        <div class="ml-4 flex-1">
                                            <p class="font-semibold">Product Name</p>
                                            <p class="text-gray-600">Quantity: 1</p>
                                            <p class="text-gray-600">Price: $25.00</p>
                                        </div>
                                        <button class="text-red-500 hover:text-red-700">Remove</button>
                                    </div>
                                    <!-- Repeat for other cart items -->
                                </div>
                            </section>

                            <!-- Order Summary -->
                            <section>
                                <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                                <div class="bg-white p-4 rounded-lg shadow dark:bg-slate-900 dark:text-gray-200">
                                    <div class="flex justify-between mb-2">
                                        <p>Subtotal</p>
                                        <p>$25.00</p>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <p>Shipping</p>
                                        <p>$5.00</p>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <p>Tax</p>
                                        <p>$2.50</p>
                                    </div>
                                    <div class="flex justify-between font-bold">
                                        <p>Total</p>
                                        <p>$32.50</p>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                            <!-- Customer Information -->
                            <section class="lg:col-span-2">
                                <h2 class="text-xl font-bold mb-4">Customer Information</h2>
                                <div class="bg-white p-4 rounded-lg shadow dark:bg-slate-900 dark:text-gray-200">
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700 dark:text-gray-200">Name</label>
                                        <input type="text" id="name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 dark:text-gray-200">Email</label>
                                        <input type="email" id="email"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                                    </div>
                                    <div class="mb-4">
                                        <label for="address" class="block text-gray-700 dark:text-gray-200">Address</label>
                                        <input type="text" id="address"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                                    </div>
                                    <div class="mb-4">
                                        <label for="city" class="block text-gray-700 dark:text-gray-200">City</label>
                                        <input type="text" id="city"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                                    </div>
                                    <div class="mb-4">
                                        <label for="zip" class="block text-gray-700 dark:text-gray-200">Zip Code</label>
                                        <input type="text" id="zip"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900 dark:text-gray-200">
                                    </div>
                                </div>
                            </section>

                            <!-- Shipping Method -->
                            <section>
                                <h2 class="text-xl font-bold mb-4">Shipping Method</h2>
                                <div class="bg-white dark:text-gray-200 dark:bg-slate-900 p-4 rounded-lg shadow">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-200">
                                            <input type="radio" name="shipping" class="mr-2"> Standard - $5.00
                                        </label>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-200">
                                            <input type="radio" name="shipping" class="mr-2"> Express - $15.00
                                        </label>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                            <!-- Payment Method -->
                            <section class="lg:col-span-2">
                                <h2 class="text-xl font-bold mb-4">Payment Method</h2>
                                <div class="bg-white p-4 rounded-lg shadow dark:bg-slate-900">
                                    <div class="mb-4">
                                        <label for="card-number" class="block text-gray-700 dark:text-gray-200">Card Number</label>
                                        <input type="text" id="card-number"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                    <div class="mb-4">
                                        <label for="expiry" class="block text-gray-700 dark:text-gray-200">Expiry Date</label>
                                        <input type="text" id="expiry"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                    <div class="mb-4">
                                        <label for="cvc" class="block text-gray-700 dark:text-gray-200">CVC</label>
                                        <input type="text" id="cvc"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                </div>
                            </section>

                            <!-- Place Order Button -->
                            <section>
                                <h2 class="text-xl font-bold mb-4">Place Order</h2>
                                <div class="bg-white dark:bg-slate-900 p-4 rounded-lg shadow flex items-center justify-center">
                                    <button
                                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                        Place Order
                                    </button>
                                </div>
                            </section>
                        </div>
                    </main>
                </div>
            </body>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue"
</script>