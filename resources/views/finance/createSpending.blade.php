@extends('layouts.app')

<form action="{{route('spending.store')}}" method="post" style=" margin-top: 10%; text-align: center">
    @csrf
    <input type="text" name="amount" placeholder="Сумма" style="padding: 5px">

    <input type="text" name="purpose" placeholder="Цель" style="padding: 5px">
    <br>
    <input type="text" name="comment" placeholder="Комментарий" style="padding: 5px">
    <br>
    <button type="submit" style="padding: 5px">Submit</button>
</form>
<br>
<br>
<br>
<a href="/finance">Главная</a>

