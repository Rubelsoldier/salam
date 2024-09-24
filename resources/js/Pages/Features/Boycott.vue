<template>
    <AuthenticatedLayout>
      <div class="grid lg:grid-cols-12 gap-6 p-6 bg-gray-50 dark:bg-gray-900">
        <div class="lg:col-span-3 lg:order-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md overflow-hidden">
          <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-300">Following</h3>
          <FollowingList :users="followings" />
          <hr class="my-4" />
          <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-300">Groups</h3>
          <GroupList :groups="groups" />
        </div>
  
        <div class="lg:col-span-6 lg:order-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md overflow-hidden flex flex-col">
          <div class="max-w-[768px] mx-auto w-full">
            <div class="mb-6">
              <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Product Selection</h2>
              <div class="flex flex-wrap gap-4 items-center">

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Product</label>
                  <select 
                    v-model="selectedProduct"
                    @change="updateValuesFromProduct"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="(data, key) in productsData" :key="key" :value="key">{{ key }}</option>
                  </select>
                </div>

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Country</label>
                  <select 
                    v-model="selectedCountry"
                    @change="updateValuesFromCountry"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="country in uniqueCountries" :key="country" :value="country">{{ country }}</option>
                  </select>
                </div>

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Company</label>
                  <select 
                    v-model="selectedCompany"
                    @change="updateValuesFromCompany"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="company in uniqueCompanies" :key="company" :value="company">{{ company }}</option>
                  </select>
                </div>

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Price</label>
                  <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">$0.55</p>
                </div>
              </div>
            </div>
  
            <div>
              <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Alternative Products</h2>
              <div class="flex flex-wrap gap-4 items-center">

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Product</label>
                  <select 
                    v-model="selectedAlternativeProduct"
                    @change="updateAlternativeValuesFromProduct"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="(data, key) in productsData" :key="key" :value="key">{{ key }}</option>
                  </select>
                </div>

                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Country</label>
                  <select 
                    v-model="selectedAlternativeCountry"
                    @change="updateAlternativeValuesFromCountry"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="country in uniqueCountries" :key="country" :value="country">{{ country }}</option>
                  </select>
                </div>
                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Company</label>
                  <select 
                    v-model="selectedAlternativeCompany"
                    @change="updateAlternativeValuesFromCompany"
                    class="rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 w-full max-w-xs text-sm leading-6 dark:bg-slate-900 dark:text-gray-200"
                  >
                    <option v-for="company in uniqueCompanies" :key="company" :value="company">{{ company }}</option>
                  </select>
                </div>
                <div class="flex flex-col">
                  <label class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Price</label>
                  <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">$0.55</p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="lg:col-span-3 lg:order-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md overflow-hidden">
          <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-300">Upcoming Features</h3>
          <UpcomingFeatures :users="followings" />
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref, computed, watch } from 'vue';
  import GroupList from "@/Components/app/GroupList.vue";
  import UpcomingFeatures from "@/Components/app/UpcomingFeatures.vue";
  import FollowingList from "@/Components/app/FollowingList.vue";
  
  const props = defineProps({
    posts: Object,
    groups: Array,
    followings: Array
  });
  
  // Data properties for selected values and options
  const selectedProduct = ref('clear');
  const selectedCountry = ref('');
  const selectedCompany = ref('');
  
  const selectedAlternativeProduct = ref('clear');
  const selectedAlternativeCountry = ref('');
  const selectedAlternativeCompany = ref('');
  
  const productsData = {
    clear: { countries: 'usa', companies: 'xyz' },
    crysclear: { countries: 'qatar', companies: 'alhaya' },
    lays: { countries: 'usa', companies: 'jacob' },
    ring: { countries: 'bangladesh', companies: 'bombay' },
  };

  // Computed properties for unique countries and companies
  const uniqueCountries = computed(() => {
    const countries = Object.values(productsData).map(product => product.countries);
    return [...new Set(countries)];
  });
  
  const uniqueCompanies = computed(() => {
    const companies = Object.values(productsData).map(product => product.companies);
    return [...new Set(companies)];
  });
  
  // Functions to update main product values based on selection
  const updateValuesFromProduct = () => {
    
    const product = selectedProduct.value;
    if (productsData[product]) {
      selectedCountry.value = productsData[product].countries;
      selectedCompany.value = productsData[product].companies;
    }
  };
  
  const updateValuesFromCountry = () => {
    for (const [key, value] of Object.entries(productsData)) {
      console.log(key+' '+value);
      if (value.countries === selectedCountry.value) {
        selectedProduct.value = key;
        selectedCompany.value = value.companies;
        break;
      }
    }
  };
  
  const updateValuesFromCompany = () => {
    for (const [key, value] of Object.entries(productsData)) {
      if (value.companies === selectedCompany.value) {
        selectedProduct.value = key;
        selectedCountry.value = value.countries;
        break;
      }
    }
  };
  
  // Functions to update alternative product values based on selection
  const updateAlternativeValuesFromProduct = () => {
    const product = selectedAlternativeProduct.value;
    if (productsData[product]) {
      selectedAlternativeCountry.value = productsData[product].countries;
      selectedAlternativeCompany.value = productsData[product].companies;
    }
  };
  
  const updateAlternativeValuesFromCountry = () => {
    for (const [key, value] of Object.entries(productsData)) {
      if (value.countries === selectedAlternativeCountry.value) {
        selectedAlternativeProduct.value = key;
        selectedAlternativeCompany.value = value.companies;
        break;
      }
    }
  };
  
  const updateAlternativeValuesFromCompany = () => {
    for (const [key, value] of Object.entries(productsData)) {
      if (value.companies === selectedAlternativeCompany.value) {
        selectedAlternativeProduct.value = key;
        selectedAlternativeCountry.value = value.countries;
        break;
      }
    }
  };
  
  // Initialize main and alternative values
  watch(selectedProduct, updateValuesFromProduct);
  watch(selectedCountry, updateValuesFromCountry);
  watch(selectedCompany, updateValuesFromCompany);
  
  watch(selectedAlternativeProduct, updateAlternativeValuesFromProduct);
  watch(selectedAlternativeCountry, updateAlternativeValuesFromCountry);
  watch(selectedAlternativeCompany, updateAlternativeValuesFromCompany);
  
  updateValuesFromProduct();
  updateAlternativeValuesFromProduct();

  </script>
  
  <style scoped>
  /* Add some custom styles here if needed */
  </style>
  