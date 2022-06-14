<template id="app">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Grant Points</h1>
        </div>
    </header>
     <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="mt-10 md:mt-0 md:col-span-2">

                <form @submit="pointsCollection">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <label for="spending" class="block font-medium text-gray-700">Spending</label>
                                    <input type="decimal" name="spending" id="spending" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Spending"/>
                                </div>
                                <div class="col-span-2">
                                    <label for="points" class="block font-medium text-gray-700">Points</label>
                                    <input type="number" name="points" id="points" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Points"/>
                                </div>
                                <div class="col-span-2">
                                    <label for="phoneNumber" class="block font-medium text-gray-700">Phone Number</label>
                                    <input type="string" name="phoneNumber" id="phoneNumber" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone Number"/>
                                </div>
                                <!-- <div class="col-span-3">
                                    <label for="outletName" class="block font-medium text-gray-700">Outlet Name</label>
                                    <input type="text" name="outletName" id="outletName" value="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Outlet Name"/>
                                </div>
                                <div class="col-span-3">
                                    <label for="outletId" class="block font-medium text-gray-700">Outlet ID</label>
                                    <input type="text" name="outletId" id="outletId" value="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Outlet Name"/>
                                </div> -->
                            </div>
                        </div>  
                        <div class="px-4 py-3 bg-gray-50 sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Grant
                            </button>
                        </div>
                </div>
                </form>
            </div>
            </div>
        </div>
</template>
<script>

export default{
    components: {
        
    },
    data(){
        return{
            spending: null,
            points: null,
            phoneNumber: null,
            // outletName: null,
            // outletId: null,
        }
    }, 
    methods: {
        pointsCollection() {
            const form = new FormData();
            form.append('spending',this.spending);
            form.append('points', this.points);
            form.append('phoneNumber', this.phoneNumber);
    
            this.$http.post('/pointsCollection', form)
            .then(() => {
                console.log('success');
            }, (err) => {
                console.log(err);
            });
        },

        // loadOutletInfo(){
        //     this.$http.get('/pointsCollection', {
        //         params: {
        //         page: this.page,
        //         params: this.serverParams
        //         }
        //     }).then(res => {
        //         this.isLoading = false;
        //         this.outlet = res.data.data.outlet.data;
        //     })
        // }
        
    }
}


</script>