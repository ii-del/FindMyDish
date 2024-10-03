<x-app-layout>
    <h1>FindMyDish</h1>
    <form action="/recipes" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="recipe">
            <h2>料理名</h2>
            <input type="file" name="recipe[image]"><br>
            <input type="text" name="recipe[name]" placeholder="料理名">{{ old('recipe.name') }}</input>
            <p class="name__error" style="color:red">{{ $errors->first('recipe.name') }}</p>
            <input type='number' name="recipe[headcount]" placeholder="何人前">{{ old('recipe.headcount') }}</input>人前
            <p class="headcount__error" style="color:red">{{ $errors->first('recipe.headcount') }}</p>
        </div>
        
        <div class="ingredients-container">
            <table>
                <thead>
                    <tr>
                        <th>材料</th>
                        <th>分量</th>
                        <th>単位</th>
                    <tr>
                </thead>
                <div class="ingredient">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="ingredient[1][name]" placeholder="材料" value="{{ old('ingredient.name') }}">
                            <p class="name__error" style="color:red">{{ $errors->first('ingredient.name') }}</p>
                        </td>
                        <td>
                            <input type="number" step="0.01" name="ingredient[1][amount]" placeholder="分量" value="{{ old('ingredient.amount') }}">
                            <p class="amount__error" style="color:red">{{ $errors->first('ingredient.amount') }}</p>
                        </td>
                        <td>
                            <input type="text" name="ingredient[1][unit]" placeholder="単位" value="{{ old('ingredient.unit') }}">
                            <p class="unit__error" style="color:red">{{ $errors->first('ingredient.unit') }}</p>
                        </td>
                    </tr>
                </tbody>
                </div>
            </table>
        </div>
        <button id="add_ingredient" type="button">追加</button>
        <div class="steps-container">
            <h2>手順</h2>
            <div class="step">
                <h2>手順(1)：</h2>
                <textarea name="step[body]" placeholder="料理手順を入力してください">{{ old('step.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('step.body') }}</p>
            </div>
        </div>
        <button id="add_step" type="button">追加</button>
        </br>

        
        <button type="submit">保存</button>
    </form>
    
    

    <div class="back">[<a href="/recipes">back</a>]</div>
    
    <script>
        document.querySelector('#add_ingredient').addEventListener('click', () => {
              const formCount = document.querySelectorAll('div.ingredient').length + 1;
              
              // 項目1：材料名
              const newForm_name = document.createElement('input');
              newForm_name.type = 'text';
              newForm_name.name = 'ingredient[' + formCount + '][name]';
              const newLabel_name = document.createElement('label');
              //newLabel_name.textContent = `材料(${formCount})：`;
              newLabel_name.appendChild(newForm_name);
              
              // 項目2：分量
              const newForm_amount = document.createElement('input');
              newForm_amount.type = 'number';
              newForm_amount.name = 'ingredient[' + formCount + '][amount]';
              const newLabel_amount = document.createElement('label');
              //newLabel_amount.textContent = `分量(${formCount})：`;
              newLabel_amount.appendChild(newForm_amount);
              
              // 項目3：単位
              const newForm_unit = document.createElement('input');
              newForm_unit.type = 'text';
              newForm_unit.name = 'ingredient[' + formCount + '][unit]';
              const newLabel_unit = document.createElement('label');
              //newLabel_unit.textContent = `単位(${formCount})：`;
              newLabel_unit.appendChild(newForm_unit);
              
              // 全てを1つのdivにまとめる
              const newDiv = document.createElement('div');
              newDiv.classList.add('ingredient');
              newDiv.appendChild(newLabel_name);
              newDiv.appendChild(newLabel_amount);
              newDiv.appendChild(newLabel_unit);
        
              // 親のdivに追加する
              document.querySelector('div.ingredients-container').appendChild(newDiv);
        });
    </script>
    
     <script>
        document.querySelector('#add_step').addEventListener('click', () => {
              const formCount = document.querySelectorAll('div.step').length + 1;
              
              // 項目：手順
              const newForm_step = document.createElement('textarea');
              newForm_step.rows = 2;  // 縦の行数
              newForm_step.cols = 50; // 横幅
              const newLabel_step = document.createElement('label');
              newLabel_step.textContent = `手順(${formCount})：`;
              newLabel_step.appendChild(newForm_step);
              
              // 全てを1つのdivにまとめる
              const newDiv = document.createElement('div');
              newDiv.classList.add('step');
              newDiv.appendChild(newLabel_step);
        
              // 親のdivに追加する
              document.querySelector('div.steps-container').appendChild(newDiv);
        });
    </script>


    
</x-app-layout>
