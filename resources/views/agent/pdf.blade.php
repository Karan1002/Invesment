<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policy Details</title>
</head>

<body>
    <div class="container" align="center">
        <h3 align="right">9427523307</h3>
        <h1>Maa Sharde Invesment</h1>
        <h3>10, Sarita Park, Shopping Center, Vatva, Ahemdabad - 382440</h3>
        <hr>
    </div>

    <div class="container">
        @foreach($data as $i)
        <h2>Name:- {{$i->name}}</h2>
        <h2>Policy Number:- {{$i->policy_no}}</h2>
        <h2>Premium:- {{$i->premium}}</h2>
        <h2>Sum Assured:- {{$i->sum_assured}}</h2>
        <h2>Plan Term:- {{$i->plan_term}}</h2>
        <h2>Mode:- {{$i->mode}}</h2>
        <h2>Address:- {{$i->address}}</h2>
        <h2>Risk Date:- {{$i->risk_date}}</h2>
        <h2>Due Date:- {{$i->due_date}}</h2>
        @endforeach
    </div>
</body>

</html>