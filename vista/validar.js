let venta1 = document.getElementById('venta1')
let venta2 = document.getElementById('venta2')
let venta3 = document.getElementById('venta3')
let soloNumeros = (e) => {

    if ((e.keyCode < 48 || e.keyCode > 57) && e.keyCode) {
        e.preventDefault()
    }
}
venta1.addEventListener('keypress', soloNumeros)
venta2.addEventListener('keypress', soloNumeros)
venta3.addEventListener('keypress', soloNumeros)