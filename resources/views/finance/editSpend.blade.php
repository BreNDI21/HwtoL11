@extends('layouts.app')

<form action="{{route('spending.update', $spend->id)}}" method="post">
@csrf
@method('patch')
    <input type="text" name="amount" placeholder="Сумма" value="{{$spend->amount}}">
    <input type="text" name="purpose" placeholder="Цель" value="{{$spend->purpose}}">
    <input type="text" name="comment" placeholder="Комментарий" value="{{$spend->comment}}">
    <button type="submit">Submit</button>

</form>
<br>
<br>
<br>
<a href="/finance">Главная</a>
