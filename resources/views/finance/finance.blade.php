@extends('layouts.app')

<h1>{{$my_balance}}</h1>
@foreach($spendings as $spending)
    <h1>{{$spending}}</h1>
    @endforeach
@foreach($earnings as $earn)
<h2>{{$earn}}</h2>
    @endforeach
