<template>
    <div class="w-full justify-center py-12 container mx-auto">
        <div class="bg-white rounded shadow overflow-hidden justify-center">
            <h1 class="mb-8 font-bold text-2xl m-10">
               User Edit
            </h1>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="absolute right-0 top-0 m-5">
                    <div class="flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2" v-show="showAlert">
                        <!-- icons -->
                    <div class="text-green-500 rounded-full bg-white mr-3">
                    <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                    </svg>
                    </div>
                    <!-- message -->
                        <div class="text-white max-w-xs ">
                            Saved
                        </div>
                    </div>

                    
                </div>
                <jet-validation-errors class="mb-4" />
                <form @submit.prevent="store">
                    <div class="">
                        <div class="mb-4">

                           <br>
                           <div class="block">
                                <span class="text-gray-700">Roles</span>
                                <div class="mb-2">
                                    <div  v-for="role in roles">
                                        <label class="inline-flex items-center" >
                                            <input type="checkbox" class="form-checkbox" v-model="formData.role_ids" :value="role.id">
                                            <span class="ml-2">{{role.name}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Enter Name" v-model="formData.name" required>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Enter Email" v-model="formData.email" rows="4" required>

                        </div>


                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button @click.prevent="deleteUser(user)" tabindex="-1" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"  >
                                Delete
                            </button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button tabindex="-1" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"  >
                                Update
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto justify-left">
                            <inertia-link :href="route('users.index')">
                                <button type="button" class="justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Back
                                </button>
                            </inertia-link>
                        </span>
                    </div>
                </form>
            </div>


        </div>

    </div>
</template>

<script>
    import AppLayout from '../../Layouts/AppLayout'
    import Welcome from '../../Jetstream/Welcome'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import { InertiaLink,
            createInertiaApp} from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout,
        Welcome,
        InertiaLink,
        JetValidationErrors

        },
    props: ['user', 'roles'],
        data() {
            return {
                showAlert: false,
                formData: {
                    'role_ids' : [],
                    'name' : null,
                    'email' : null
                },
                errors:{}

            }
        },

        mounted() {
            if(this.user) {
                this.formData.name = this.user.name;
                this.formData.email = this.user.email;
                this.formData.role_ids = this.user.roles.map(role => role.id);
            }
        },

    methods: {
        store() {
            axios.put(this.route('users-api.update', this.user.id), this.formData)
            .then(response => this.showAlert=true)

            .catch(e => {
                this.errors = e.response.data.errors,
                this.showAlert= false;
            });

            
        },

        deleteUser(user){
            this.showAlert= false;
            var del = confirm("Are you sure you to delete?");
            if(del == true){
                axios.delete(this.route('users-api.destroy', user.id))
                .then(response =>
                    this.showAlert=true,
                    );
            } else{}
        }
    },


}
</script>
