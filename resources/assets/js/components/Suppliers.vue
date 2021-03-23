<template>
  <html>
    <div class="mt-8 sm:block">
      <div class="align-middle inline-block min-w-full border-b border-gray-200">
        <div class="hidden sm:block">
          <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mt-2">
              <div class="align-middle min-w-full overflow-x-auto shadow overflow-scroll sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead>
                    <tr class="text-right">
                      <th class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                          ID
                      </th>
                      <th class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created
                      </th>
                      <th class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="(item,index) in testy" :key="index" class="bg-white text-right">
                      <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500 truncate group-hover:text-gray-900">
                      {{ item.id }}
                      </td>
                      <td class="px-6 py-3 text-right whitespace-nowrap text-sm text-gray-500">
                        {{ item.name }}
                      </td>
                      <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500 md:block">
                        {{ item.created_at }}
                      </td>
                      <td class="px-6 py-3  text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="#" class="text-red-700 hover:text-red-700">Delete</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </html>
</template>

<script>
  export default {
  name: "Suppliers",
    data(){
      return {
        testy:{},
        order_detail : ""
      }
    },
    created(){
      console.log("ggvbhfgffgdgfdfg")
      this.items()
    },
    computed: {
    },
    methods: {
    items() {
        this.$api.get('/V3/suppliers').then(res => {
          this.testy = res.data
        }).catch(err => {
          console.log(err)
        });
        return this.items
      }
    }
  }
</script>