<x-app-layout>
    <x-slot name='header'>
        <h1>FindMyDish</h1>
    </x-slot>
    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf
        <button type="submit">レシピ作成</button>
        <button type="submit">レシピ抽出</button>
        
        <h2>レシピ一覧</h2>
        <form action="create.blade.php" method="POST">
            
            
            @foreach ($recipes as $recipe)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                                        
                        <table>               
                                        
                        <tr>
                            <th>料理名：</th>
                            <td><h2 class='name'>{{ $recipe->name }}</h2></td>
                        </tr>
                        <tr>
                            <th>何人前：</th>
                            <td><p class='headcount'>{{ $recipe->headcount }}</p></td>
                        </tr>
                    
                        <!-- 材料の表示 -->
                        <tr>
                            <th>材料：</th>
                            <td>
                                <ul>
                                    @foreach ($recipe->ingredients as $ingredient)
                                        <li>{{ $ingredient->name }}: {{ $ingredient->amount }} {{ $ingredient->unit }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    
                        <!-- 手順の表示 -->
                        <tr>
                            <th>手順：</th>
                            <td>
                                <ol>
                                    @foreach ($recipe->steps as $step)
                                        <li>{{ $step->body }}</li>
                                    @endforeach
                                </ol>
                            </td>
                        </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
                   

        </form>
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
