@extends('layouts.app')

<h1>Сумма: {{$earn->amount}} грн</h1>
<p>Источник: {{$earn->source}}</p>
<p>Комментарий: {{$earn->comment}}</p>
<br>
<br>
<br>
<a href="/finance">Главная</a>

