<!-- For testing  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$max = 10;
$min = 1;

$select_q = 3; 
    
    
    ?>

<table>
    <tr>
        <td>1</td>
        <td>helo</td>
        <td><input type="checkbox" id="1"></td>
    </tr>
    <tr>
        <td>2</td>
        <td>helo</td>
        <td><input type="checkbox" id="2"></td>
    </tr>
    <tr>
        <td>3</td>
        <td>helo</td>
        <td><input type="checkbox" id="3"></td>
    </tr>
    <tr>
        <td>4</td>
        <td>helo</td>
        <td><input type="checkbox" id="4"></td>
    </tr>
    <tr>
        <td>5</td>
        <td>helo</td>
        <td><input type="checkbox" id="5"></td>
    </tr>
    <tr>
        <td>6</td>
        <td>helo</td>
        <td><input type="checkbox" id="6"></td>
    </tr>
    <tr>
        <td>7</td>
        <td>helo</td>
        <td><input type="checkbox" id="7"></td>
    </tr>
    <tr>
        <td>8</td>
        <td>helo</td>
        <td><input type="checkbox" id="8"></td>
    </tr>
    <tr>
        <td>9</td>
        <td>helo</td>
        <td><input type="checkbox" id="9"></td>
    </tr>
    <tr>
        <td>10</td>
        <td>helo</td>
        <td><input type="checkbox" id="10"></td>
    </tr>
</table>



<button id="select_random">Random</button>
<div id="output">here</div>





<!-- For selection Random Quesrions  -->
<script type="text/javascript">
let random_active = 0;
let btn = document.getElementById('select_random');
let output = document.getElementById('output');

let smax = <?php echo $max ?>;
let smin = <?php echo $min ?>;
let sselect = <?php echo $select_q ?>;
let random_array = [];
let random_array_q = [];
let temp = 0;


function getRandomNumber(min, max) {
    let step1 = max - min + 1;
    let step2 = Math.random() * step1;
    let result = Math.floor(step2) + min;
    return result;
}
function createArrayOfNumbers(start, end){
    let myArray = [];
    for(let i = start; i <= end; i++) { 
        myArray.push(i);
    }
    return myArray;
}

let numbersArray = createArrayOfNumbers(smin,smax);

btn.addEventListener('click', () => {
if (random_active == 1) {
    
    
}
let it = 0;
while (it<=smax) {
    it++;

    if(numbersArray.length == 0){
        while (temp<sselect) {
            var a = random_array[temp];
            random_array_q.push(a);
            temp = temp + 1;
        }
        random_array_q.forEach(element => {
            const ran = document.getElementById(element);
            ran.checked = true;
        });
        random_active = 1;
        output.innerText = random_array_q;
        
        return;
    }
    let randomIndex = getRandomNumber(0, numbersArray.length-1);
    let randomNumber = numbersArray[randomIndex];
    numbersArray.splice(randomIndex, 1);
    output.innerText = randomNumber;
    random_array.push(randomNumber);
    console.log(random_array);
    
}
    


});




</script>
<!-- <input type="checkbox" class="btn-check" name="quiz_question[]" id="btn-check-4-outlined" autocomplete="off" value="46" onclick="return select_only()"> -->


</body>
</html>
