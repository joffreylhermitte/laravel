<x-layout>
    <div class="mx-4" id="app">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        {{--<form method="post" action="/listings/{{$listing->id}}">--}}

                            <button @click="deleteListing({{$listing->id}})" class="text-red-600">
                                <i
                                    class="fa-solid fa-trash-can"
                                ></i>
                                Delete
                            </button>
                        {{--</form>--}}
                    </td>
                </tr>
                @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No listings found</p>
                        </td>
                    </tr>
                @endunless
                </tbody>
            </table>
        </div>
    </div>
    <script>
        Vue.createApp({
            data() {
                return {



                };
            },
            mounted() {
            },

            methods: {
                deleteListing(id){
                    if(confirm("Supprimer ?")){
                        axios.delete('/listings/'+id).then(res => {
                            console.log(res.data)
                        })
                            .catch(err => console.log(err))
                    }
                }
            },
        }).mount("#app")
    </script>
</x-layout>
