<template>
    <app-layout>

      <div class="flex ">


        <div class="p-0 flex-grow  overflow-x-auto">
            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                <div class="mb-2 w-full">
                  <table class="border-collapse w-full rounded" id="tonneCaneMilled">
                     <thead>
                        <tr class="border border-gray-300">
                           <th class="px-4 py-2 " colspan="6" >Users</th>
                        </tr>
                        <tr>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300 ">ID</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300 ">Role</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300 ">Name</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300 ">Email</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300 " colspan="2">Actions</th>
                        </tr>

                     </thead>
                     <tbody>

                        <tr v-for="user in data" class="bg-white lg:hover:bg-gray-100 flex-row ">

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b ">

                                {{user.id}}
                           </td>

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center ">

                              <div v-for="role in user.roles" class="inline-flex">


                                 <p  :class="{'m-1 px-4 py-2 text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200 uppercase ' : role.name == 'Admin',
                                 'm-1 px-4 py-2 text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 uppercase ': role.name == 'User'}" > {{role.name}}</p>

                              </div>
                           </td>

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center ">

                               {{user.name}}
                           </td>

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center ">

                              {{user.email}}
                           </td>


                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center ">

                              <inertia-link class="text-blue-400 hover:text-blue-600 underline" :href="route('users.edit', { id: user.id })">
                                Edit
                              </inertia-link>

                           </td>


                        </tr>
                     </tbody>
                  </table>

                  <inertia-link :href="route('users.create')" >
                    <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 mt-10 justify-self-auto ...">Add User</button>
                  </inertia-link>

                </div>
            </div>
        </div>
      </div>
    </app-layout>
</template>
<script >

   import AppLayout from '../../Layouts/AppLayout'
   import Welcome from '../../Jetstream/Welcome'
   import { InertiaLink,
            createInertiaApp} from '@inertiajs/inertia-vue3';

   export default{

    components: {
        AppLayout,
        Welcome,
        InertiaLink,

    },

    props:['data']


   }
</script>
