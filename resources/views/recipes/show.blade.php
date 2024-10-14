<x-app-layout>
    <x-slot name='header'>
        <h1 class="title_form">FindMyDish</h1>
    </x-slot>
    <link rel="stylesheet" href="./css/style.css">
        
    <input type="number" id="multiplier" placeholder="倍数を入力してください">
    <button onclick="calculateMultiple()">変更</button>
    
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
                    <td><p id="inputHeadcount" class='headcount'>{{ $recipe->headcount }}</p></td>
                </tr>
            
                <!-- 材料の表示 -->
                <tr>
                    <th>材料：</th>
                    <td>
                        <ul>
                            @foreach ($recipe->ingredients as $index => $ingredient)
                                <span data-amount="{{ $ingredient->amount }}"></span>
                                <p>{{ $ingredient->name }}:<span id="result-{{ $index }}">{{ $ingredient->amount }}</span>{{ $ingredient->unit }}</p>
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
    
    <script>
        document.querySelector('#change_btn').addEventListener('click', () => {
            // 現在の値を取得
            const valueElement = document.querySelector('#value');
            const changevalueElement = document.querySelector('#change_value');
            let currentValue = parseInt(valueElement.textContent);
            let changecurrentValue = parseInt(changevalueElement.textContent);
            
            // 値を2倍にする
            currentValue *= changecurrentValue;
            
            // 新しい値を表示
            valueElement.textContent = currentValue;
        });
    </script>
    
    <script>
        // JavaScript関数
        function calculateMultiple() {
            
            let preHeadcount = @json($recipe->headcount);

            // inputフィールドから倍数を取得
            let multiplier = document.getElementById('multiplier').value;

            // 結果を表示
            document.getElementById('inputHeadcount').textContent = multiplier;
            
            document.querySelectorAll('[data-amount]').forEach((element, index) => {
                // 各amount値を取得
                let amount = element.dataset.amount; 
                // 倍数計算 
                let result = amount * multiplier / preHeadcount;
                // 計算結果を表示 
                document.getElementById('result-' + index).textContent = result;
            });
        }
    </script>

    <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
