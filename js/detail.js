const minQuantity = 1;
// to be updated when page loads
let maxQuantity = 0;
let currentQty = 0;

function updateTotalPrice( qty, price ) {
  const total = parseInt(qty) * parseFloat(price);
  $('#total-price').text( total.toFixed(2) );
}

$(document).ready( () => {
  // get the total avaible quantity
  maxQuantity = parseInt( $('#available').text() );
  const qtyField = $('#quantity');
  currentQty = $(qtyField).val();
  const itemPrice = parseFloat( $('#product-price').text() );
  // add listeners to plus
  $('#plus').click( () => {
    if( currentQty < maxQuantity && currentQty >= minQuantity ) {
      currentQty++;
      $(qtyField).val(currentQty);
      updateTotalPrice( currentQty, itemPrice );
    }
  })
  $('#minus').click( () => {
    if( currentQty <= maxQuantity && currentQty > minQuantity ) {
      currentQty--;
      $(qtyField).val(currentQty);
      updateTotalPrice( currentQty, itemPrice );
    }
  })
})
