@extends('layouts.app')

<form action="/Calculate" style="margin-left: 45%">
    @csrf
    @if(isset($my_balance))
    <h1>My balance: {{$my_balance}}</h1>
    @endif
    <button type="submit" style="margin-left: 5%">Calculate my balance</button>
</form>
<br>
<br>
<ul style="border: 1px solid black; width: 500px; text-align: center;margin-left: 35%"><h1>Доходы</h1>

@foreach($earnings as $earn)
        <li>
            <a href="{{route('earning.show',  $earn->id)}}" style="font-size: 20px">{{$earn->amount}}</a>
            <a href="{{route('earning.edit',  $earn->id)}}" style="margin-left: 10px">Edit</a>
        </li>
    @endforeach
    <a href="{{route('earning.create')}}">Add new Earn</a>
    </ul>
<br>
<br>
<br>
<ul style="border: 1px solid black; width: 500px; text-align: center;margin-left: 35%"><h1>Расходы</h1>
    @foreach($spending as $spend)
        <li>
            <a href="{{route('spending.show', $spend->id)}}" style="font-size: 20px">{{$spend->amount}}</a>
            <a href="{{route('spending.edit',  $spend->id)}}" style="margin-left: 10px">Edit</a>

        </li>
    @endforeach
    <a href="{{route('spending.create')}}">Add new spend</a>
</ul>
