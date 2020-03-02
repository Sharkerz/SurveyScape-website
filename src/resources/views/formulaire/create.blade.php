@extends('layouts.app')

@section('content')

<body>

    <form method="post">
        <input type="text" name="test">
        <input type="submit">

    </form>

<?php

    echo $_POST['test'];

?>


</body>

@endsection

