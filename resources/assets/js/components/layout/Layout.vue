<template>
    <html>
      <div class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="md:hidden">
            <div class="fixed inset-0 flex z-40">
            <!--
                Off-canvas menu overlay, show/hide based on off-canvas menu state.

                Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
                Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>
            <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
                <div class="flex-shrink-0 flex items-center px-4">
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    <a href="#" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Orders
                    </a>

                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Products
                    </a>

                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Suppliers
                    </a>

                     <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Suppliers Products
                    </a>
                </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="bg-gray-900 flex flex-col h-0 flex-1">
                <div class="bg-gray-900 flex-1 flex flex-col overflow-y-auto">
                <nav class="mt-12 px-2 space-y-1">
                    <a href="#" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" @click="orderTrue()">
                    Orders
                    </a>

                    <a href="#" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" @click="orderDetailsTrue()">
                    Order Details
                    </a>

                    <a href="#" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" @click="productsTrue()">
                    Products
                    </a>

                    <a href="#" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" @click="suppliersTrue()">
                    Suppliers
                    </a>

                     <a href="#" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" @click="supplierproductsTrue()">
                    Suppliers Products
                    </a>
                </nav>
                </div>
            </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-2 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                <form class="w-full flex md:ml-0" action="#" method="GET">
                    <label for="search_field" class="sr-only">Search</label>
                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/search -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">
                    </div>
                </form>
                </div>
            </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <h1 class="text-2xl font-semibold text-gray-900">Views</h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <Orders v-if="orders" />
                    <OrderDetails v-if="orderDetails" />
                    <Products v-if="products" />
                    <Suppliers v-if="suppliers" />
                    <SupplierProducts v-if="supplierproducts" />
                </div>
            </div>
            </main>
        </div>
        </div>
    </html>
</template>

<script>
import Orders from '../Orders.vue'
import OrderDetails from '../OrderDetails.vue'
import Products from '../Products.vue'
import Suppliers from '../Suppliers.vue'
import SupplierProducts from '../SupplierProducts.vue'
export default {
    name: 'Layout',
    components: {
        Orders,
        OrderDetails,
        Products,
        Suppliers,
        SupplierProducts
    },
    data() {
        return {
            orders: true,
            orderDetails: false,
            products: false,
            suppliers: false,
            supplierproducts: false
        }
    },
    methods: {
        orderTrue() {
            this.orders = true
            this.orderDetails = false
             this.products = false
             this.suppliers = false
             this.supplierproducts = false
        },
          orderDetailsTrue() {
            this.orderDetails = true
             this.orders = false
            this.products = false
             this.suppliers = false
             this.supplierproducts = false
        },
        productsTrue() {
            this.products = true
             this.suppliers = false
             this.supplierproducts = false
            this.orderDetails = false
             this.orders = false
        },
        suppliersTrue() {
            this.suppliers = true
            this.supplierproducts = false
            this.orderDetails = false
             this.orders = false
              this.products = false
        },
        supplierproductsTrue() {
            this.supplierproducts = true
              this.orderDetails = false
             this.orders = false
              this.products = false
                this.suppliers = false
        }
    }
}
</script>