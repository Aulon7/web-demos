document.getElementById('loan-form').addEventListener('submit', function(e) {

    // Show loader 
    document.getElementById('loading').style.display = 'block';

    setTimeout(calculateResult, 2000);

    e.preventDefault();
});

// Function of calculate

function calculateResult() {

    // UI Variables
    const amount = document.getElementById('amount');
    const interest = document.getElementById('interest');
    const years = document.getElementById('years');
    const monthlyPayment = document.getElementById('monthly-payment');
    const totalPayment = document.getElementById('total-payment');
    const totalInterest = document.getElementById('total-interest');
    
    const principal = parseFloat(amount.value);
    const calculatedInterest = parseFloat(interest.value) / 100 / 12;
    const calculatedPayment = parseFloat(years.value) * 12;

    // Monthly Payment calculation 
     const x = Math.pow(1 + calculatedInterest, calculatedPayment);
     const monthly = (principal * x * calculatedInterest)/(x-1);
     
     if(isFinite(monthly)) {
        monthlyPayment.value = monthly.toFixed(2);
        totalPayment.value = (monthly * calculatedPayment).toFixed(2);
        totalInterest.value = ((monthly * calculatedPayment) - principal).toFixed(2);

        //Show Result
        document.getElementById('results').style.display = 'block';

        //Hide Loader
        document.getElementById('loading').style.display = 'none';
     }
     else { 
            showError();
        
     }
}

function showError() {
    alert('Check your numbers!')
            
            // Hide results and loader if there is any error occured
            document.getElementById('results').style.display = 'none';

            document.getElementById('loading').style.display = 'none';
            
}