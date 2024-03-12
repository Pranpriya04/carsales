<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>เว็บคำนวณผ่อนรถ</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="number"], select {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<form id="carLoanForm">
    <label for="carPrice">ราคารถยนต์ (บาท):</label>
    <input type="number" id="carPrice" name="carPrice" required>

    <label for="downPayment">เงินดาวน์ (บาท):</label>
    <input type="number" id="downPayment" name="downPayment" required>

    <label for="interestRate">อัตราดอกเบี้ย (% ต่อปี):</label>
    <input type="number" id="interestRate" name="interestRate" step="0.01" max="20" required>

    <label for="loanPeriod">จำนวนงวด (ปี):</label>
    <input type="number" id="loanPeriod" name="loanPeriod" max="6" required>

    <input type="submit" value="คำนวณ">
</form>

<div id="result" style="display: none;">
    <h2>ผลลัพธ์</h2>
    <p>ผ่อนชำระรายเดือน: <span id="monthlyPayment"></span> บาท</p>
    <p>จำนวนเดือน: <span id="numOfMonths"></span> เดือน</p>
</div>

<script>
document.getElementById("carLoanForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var carPrice = parseFloat(document.getElementById("carPrice").value);
    var downPayment = parseFloat(document.getElementById("downPayment").value);
    var interestRate = parseFloat(document.getElementById("interestRate").value);
    var loanPeriod = parseFloat(document.getElementById("loanPeriod").value);

    var loanAmount = carPrice - downPayment;
    var monthlyInterestRate = interestRate / 100 / 12;
    var numOfPayments = loanPeriod * 12;

    var monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numOfPayments));
    var totalPayment = monthlyPayment * numOfPayments;

    document.getElementById("monthlyPayment").textContent = monthlyPayment.toFixed(2);
    document.getElementById("numOfMonths").textContent = numOfPayments;

    document.getElementById("result").style.display = "block";
});
</script>
</body>
</html>
