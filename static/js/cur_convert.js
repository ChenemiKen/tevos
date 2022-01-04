// const total_price = document.getElementById('total-price')
const total_price_cur = document.getElementById('total-price-cur')
const currencies = document.getElementsByClassName('currency')
const total_price_value = document.getElementById('total-price-value')

// const from_cur = cur
Array.prototype.forEach.call(currencies, function(currency) {
    currency.addEventListener('click', (event)=>{
        event.preventDefault()
        var from_cur = total_price_cur.getAttribute('name')
        var to_cur = currency.name
        var amount = total_price_value.innerHTML
        var to_symbol = currency.innerHTML
        convertCurrency(amount, from_cur, to_cur, function(e){
            total_price_cur.innerHTML = to_symbol
            total_price_value.innerHTML = e

        })

    })
});

function convertCurrency(amount, fromCurrency, toCurrency, cb) {
    // var apiKey = 'f010e3f8fba6ddfdd7f8';
  
    fromCurrency = encodeURIComponent(fromCurrency);
    toCurrency = encodeURIComponent(toCurrency);
    var query = 'from='+fromCurrency+'&to='+toCurrency+'&amount='+amount;
  
    var url = 'https://currency-converter5.p.rapidapi.com/currency/convert?format=json&'+query;
  
    fetch(url,{
        method: 'GET',
        headers: {
            "x-rapidapi-host": "currency-converter5.p.rapidapi.com",
            "x-rapidapi-key": "23383a841fmsh07b5c90d4e5e4f8p12379djsn25c7dd3eeb36"
        }
    }).then(res =>{
        // var body = '';
        if(!res.ok) {
            throw new Error('Currency converter failed!');
        }
        return res.text()
    }).then(data =>{
        try {
            var jsonObj = JSON.parse(data);
            console.log(jsonObj)
            var val = parseInt(jsonObj.rates[toCurrency]['rate_for_amount']);
            console.log(val)
            if (val) {
            //   var total = val * amount;
              cb(val);
            } else {
              var err = new Error("Value not found for " + query);
              console.log(err);
              cb(err);
            }
          } catch(e) {
            console.log("Parse error: ", e);
            cb(e);
          }
    }).catch(err=>{
        console.log("Got an error: ", err);
        cb(err);
    })
}