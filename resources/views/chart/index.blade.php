@include('layouts.master')
<style>
    .container-fluid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;

        /* fraction*/
    }
</style>

<div class="container-fluid">

    <div class="f">
        <canvas id="cityChart"></canvas>
    </div> 

    <div class="g">
        <canvas id="brandChart"></canvas>
    </div> 

    <div class="h">
        <canvas id="townChart"></canvas>
    </div> 

</div>
<!-- {{-- <canvas id="cityChart" width="800" height="450"></canvas> --}} -->
