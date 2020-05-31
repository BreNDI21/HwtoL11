@extends('layouts.app')
<form action="{{route('earning.store')}}" method="post" style=" margin-top: 10%; text-align: center">
@csrf
    <input type="text" name="amount" placeholder="Сумма" style="padding: 5px">

    <input type="text" name="source" placeholder="Источник" style="padding: 5px">
    <br>
    <input type="text" name="comment" placeholder="Комментарий" style="padding: 5px">
    <br>
    <button type="submit" style="padding: 5px">Submit</button>
</form>
<br>
<br>
<br>
<a href="/finance">Главная</a>
