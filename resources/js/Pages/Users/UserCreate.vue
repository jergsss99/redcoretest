<template>
    <div class="w-full justify-center py-12 container mx-auto">

        <div class="bg-white rounded shadow overflow-hidden justify-center">
            <h1 class="mb-8 font-bold text-2xl m-10">
               User
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

                   <div class="flex items-center bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2" v-for="error in errors">

                     <!-- icons -->
                        <div class="text-red-500 rounded-full bg-white mr-3">
                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                        </svg>
                        </div>
                        <!-- message -->
                        <div class="text-white max-w-xs ">
                            {{error[0]}}
                        </div>
                    </div>

                </div>

                <div v-if="showUserInfo" class="overflow-x-hidden overflow-hidden fixed inset-0 z-50 outline-none-none justify-center items-center flex shadow-xl" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="relative w-auto my-6 mx-auto max-w-sm">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">

                            <!--header-->
                            <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                <h4 class="text-3xl font-semibold">
                                    User Info
                                </h4>

                            </div>
                            <!--body-->
                            <div class="relative p-6 flex-auto">
                                <span class="inline-block align-middle mr-8">Name: <b >{{ user.name}} </b></span><br/>
                                <span class="inline-block align-middle mr-8">Email: <b >{{ user.email }} </b></span><br/>
                                <span class="inline-block align-middle mr-8">Password: <b >{{ user.password }} </b></span>
                            </div>
                            <!--footer-->
                            <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                <button class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease"
                                @click="closeUserInfo">
                                    OK
                                </button>

                            </div>
                    </div>
                    </div>
                </div>

                <jet-validation-errors class="mb-4" />
                <form @submit.prevent="store">
                    <div class="">
                        <div class="mb-4">

                            <div class="block">
                                <span class="text-gray-700">Role(s)</span>
                                <div class="mb-2">
                                    <div  v-for="role in roles">
                                        <label class="inline-flex items-center" >
                                            <input type="checkbox" class="form-checkbox" v-model="user.role_ids" :value="role.id">
                                            <span class="ml-2">{{role.name}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Enter Name" v-model="user.name" required>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Enter Email" v-model="user.email" required>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Enter Password" v-model="user.password" required>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" id="exampleFormControlInput1" placeholder="Confirm Password" v-model="user.confirm_password" required>

                        </div>


                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                            <button tabindex="-1" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"  type="submit">
                                Add
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
    props: ['data','roles', 'errors'],
        data() {
            return {
                showAlert: false,
                showUserInfo: false,

                user: this.$inertia.form({
                    'role_ids' : [],
                    'name': '',
                    'email': '',
                    'password' : '',
                    'confirm_password' : '',

                })
            }
        },

    methods: {

        store() {

            this.user.post(this.route('users-api.store'), {
                onSuccess: () => {
                    this.showAlert = true,
                    this.showUserInfo = true
                    }
            });
        },



        closeUserInfo(){
        this.showUserInfo=false;
        },

    },
}
</script>
