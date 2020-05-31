@extends('layouts.app')

<h1>Сумма: {{$spend->amount}} грн</h1>
<p>Цель: {{$spend->purpose}}</p>
<p>Комментарий: {{$spend->comment}}</p>
<br>
<br>
<br>
<a href="/finance">Главная</a>

