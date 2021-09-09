<template>
    <app-layout>

      <div class="flex ">

        <div class="p-0 flex-grow  overflow-x-auto">
            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                <div class="mb-2 w-full">
                  <table class="border-collapse w-full rounded" id="tonneCaneMilled">
                     <thead>
                        <tr class="border border-gray-300">
                           <th class="px-4 py-2 " colspan="4" >Roles</th>
                        </tr>
                        <tr >
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300" >ID</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300" >Role</th>
                           <th class="p-3 font-bold uppercase bg-gray-200 text-gray-800 border border-gray-300" >Action</th>
                        </tr>

                     </thead>
                     <tbody>

                        <tr v-for="role in data" class="bg-white lg:hover:bg-gray-100 " >

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  flex-row">
                                {{role.id}}
                           </td>

                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b">


                                <p :class="{
                                    'm-1 px-4 py-2 text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200 uppercase ' : role.name == 'Admin',
                                }"> {{role.name}}
                                </p>
                           </td>



                           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center">

                              <inertia-link class="text-blue-400 hover:text-blue-600 underline" :href="route('roles.edit', { id: role.id })">
                                Edit
                              </inertia-link>

                           </td>

                        </tr>
                     </tbody>
                  </table>

                  <inertia-link :href="route('roles.create')" >
                    <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 mt-10 justify-self-auto ...">Add Role</button>
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


    props:['data'],
        data() {
            return {

            }
        },

   }
</script>
