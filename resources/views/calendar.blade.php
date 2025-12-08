<x-app-layout>
<div>
    <h1 class="text-4xl text-center">Calendar</h1>
    <h2 class="text-2xl my-4">Here you can schedule your menus for the day</h2>
    <h3 class="text-lg my-2">Remember to control your calories</h3>
    <?php
        $year = date('Y');
        $monthOutput = date('M');
        $monthNumber = date('m');
        $days = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);

        if(isset($_GET['month']) ){
            $monthNumber = $_GET['month'];
            if( intval($monthNumber) === 13){
                echo 'New Year';
                $year += 1;
                $monthNumber = 1;
            }else if( intval($monthNumber) === 0){
                $year -= 1;
                $monthNumber = 12;
            }
            $days = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
            $monthOutput = date('F', mktime(0, 0, 0, $monthNumber, 1, $year));  
        }
    ?>
    
    <div>
        <h4 class="mb-5">Year: <span class="font-bold"><?php echo $year; ?></span></h4>
        <h4 class="mb-5">Month: <span class="font-bold"><?php echo $monthOutput; ?></span></h4>
    </div>

    <div class="grid grid-cols-3 items-center justify-items-center">
        <a href="<?php echo '/days?year=' . ($year) . '&month=' . ($monthNumber - 1); ?>" class=""> 
            <div class="">
                <span class="text-5xl font-bold"><</span>  
            </div>
        </a>

        <div class="grid grid-cols-7 w-full">
            <?php
            for($i = 1; $i <= $days;$i++){
                echo '<a href=""><div class="border-2 border-blue-500"><span>' . $i . '</span></div></a>';
            }
            ?>
        </div>

       <a href="<?php echo '/days?year=' . ($year) . '&month=' . ($monthNumber + 1); ?>" class=""> 
            <div class="">
                <span class="text-5xl font-bold">></span>  
            </div>
        </a>
    </div>
</div>
</x-app-layout>