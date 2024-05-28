<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .display {
            background: #222;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: right;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        button {
            padding: 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ddd;
        }
        .operator {
            background-color: #f9a825;
            color: white;
        }
        .operator:hover {
            background-color: #f57f17;
        }
        .equals {
            background-color: #28a745;
            color: white;
            grid-column: span 2;
        }
        .equals:hover {
            background-color: #218838;
        }
        .clear {
            background-color: #d32f2f;
            color: white;
            grid-column: span 2;
        }
        .clear:hover {
            background-color: #c62828;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Calculatrice</h1>
        <div class="display" id="display">0</div>
        <div class="buttons">
            <button onclick="appendNumber('7')">7</button>
            <button onclick="appendNumber('8')">8</button>
            <button onclick="appendNumber('9')">9</button>
            <button class="operator" onclick="setOperation('+')">+</button>
            <button onclick="appendNumber('4')">4</button>
            <button onclick="appendNumber('5')">5</button>
            <button onclick="appendNumber('6')">6</button>
            <button class="operator" onclick="setOperation('-')">-</button>
            <button onclick="appendNumber('1')">1</button>
            <button onclick="appendNumber('2')">2</button>
            <button onclick="appendNumber('3')">3</button>
            <button class="operator" onclick="setOperation('*')">*</button>
            <button onclick="appendNumber('0')">0</button>
            <button onclick="appendNumber('.')">.</button>
            <button class="clear" onclick="clearDisplay()">C</button>
            <button class="operator" onclick="setOperation('/')">/</button>
            <button class="equals" onclick="calculate()">=</button>
        </div>
    </div>
    <form id="calcForm" action="" method="post" style="display: none;">
        <input type="number" id="nb1" name="nb1">
        <input type="text" id="op" name="op">
        <input type="number" id="nb2" name="nb2">
        <input type="submit" name="bout">
    </form>
    <?php
    if (isset($_POST["bout"])) {
        $nb1 = $_POST["nb1"];
        $op = $_POST["op"];
        $nb2 = $_POST["nb2"];
        if ($op == "+") {
            $res = $nb1 + $nb2;
        } else if ($op == "-") {
            $res = $nb1 - $nb2;
        } else if ($op == "*") {
            $res = $nb1 * $nb2;
        } else {
            if ($nb2 == 0) {
                $res = "Division par zéro, impossible!!!";
            } else {
                $res = $nb1 / $nb2;
            }
        }
        echo "<h3>$nb1 $op $nb2 = $res</h3>";
    }
    ?>
    <script>
        let currentInput = '0';
        let operation = null;
        let firstOperand = null;

        function appendNumber(number) {
            if (currentInput === '0' && number !== '.') {
                currentInput = number;
            } else {
                currentInput += number;
            }
            updateDisplay();
        }

        function setOperation(op) {
            if (currentInput === '0') return;
            if (firstOperand === null) {
                firstOperand = parseFloat(currentInput);
            } else if (operation) {
                calculate();
            }
            operation = op;
            currentInput = '0';
        }

        function calculate() {
            if (firstOperand === null || operation === null) return;
            const secondOperand = parseFloat(currentInput);
            let result;
            switch (operation) {
                case '+':
                    result = firstOperand + secondOperand;
                    break;
                case '-':
                    result = firstOperand - secondOperand;
                    break;
                case '*':
                    result = firstOperand * secondOperand;
                    break;
                case '/':
                    result = secondOperand === 0 ? 'Division par zéro, impossible!!!' : firstOperand / secondOperand;
                    break;
                default:
                    return;
            }
            currentInput = result.toString();
            operation = null;
            firstOperand = null;
            updateDisplay();
        }

        function clearDisplay() {
            currentInput = '0';
            operation = null;
            firstOperand = null;
            updateDisplay();
        }

        function updateDisplay() {
            document.getElementById('display').innerText = currentInput;
        }
    </script>
</body>
</html>
