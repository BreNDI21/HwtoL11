@extends('layouts.app')

<form action="{{route('earning.update', $earn->id)}}" method="post">
@csrf
    @method('patch')
<input type="text" name="amount" placeholder="Сумма" value="{{$earn->amount}}">
<input type="text" name="source" placeholder="Источник" value="{{$earn->source}}">
    <input type="text" name="comment" placeholder="Комментарий" value="{{$earn->comment}}">
<button type="submit">Submit</button>
</form>
<br>
<br>
<br>
<a href="/finance">Главная</a>
