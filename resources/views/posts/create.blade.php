<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>FindMyDish</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="name">
                <h2>材料</h2>
                <input type="text" name="ingredient[name]" placeholder="必要な材料を入力してください" value="{{ old('ingredient.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('ingredient.name') }}</p>
            </div>
            <div class="body">
                <h2>手順</h2>
                <textarea name="step[body]" placeholder="料理手順を入力してください">{{ old('step.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('step.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>