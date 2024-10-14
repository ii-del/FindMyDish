<x-app-layout>
    <x-slot name='header'>
        <h1 class="title_form">FindMyDish</h1>
    </x-slot>
    <form action="{{ route('recipes.store') }}" method="POST">
        <h2>レシピ一覧</h2>
        
        @foreach ($recipes as $recipe)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div class="back">
                            <a href="/recipes/{{ $recipe->id }}">
                                    
                                <table>               
                                                
                                <tr>
                                    <th>{{ $recipe->id }}：</th>
                                    <td><h3 class='name'>{{ $recipe->name }}</h3></td>
                                </tr>
                                
                                </table>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
            
    </form>
    <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
