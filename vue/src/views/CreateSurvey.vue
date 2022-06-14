<template id="app">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Create Survey</h1>
        </div>
    </header>
    <section id="app" class="section container">
        <div class="px-4 py-3 sm:px-6">
            <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" v-on:click="addQuestion">
                + Add Question
            </button> 
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="mt-10 md:mt-0 md:col-span-2">
                <form @submit="createSurvey">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6"  v-for="count in count" >
                        
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="question" class="block font-medium text-gray-700">Question {{ count }}</label>
                                    <input type="text" :name="['question' + count]" :id="['question' + count]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                </div>
                            </div>
                        </div>  
                        <div class="px-4 py-3 bg-gray-50 sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Survey</button>
                        </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</template>

<script>
import { useRouter } from 'vue-router';
import store from '../store';

export default{
    components: {
        useRouter,
        store,
    },
    data() {
        return {
            count: 1,
            questions: [],
        }
    }, 
    methods: {
        addQuestion(){
            this.count += 1;
            
        },
        createSurvey(){
            questions.append('')
        }
    }

}
    


</script>