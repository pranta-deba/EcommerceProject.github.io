$(document).ready(function() {
    const cart = new Cart();
    
    $("#cardLength").html(cart.totalItems());

    $(".addToCart").click(function() {
       $t = $(this);
       let id = $t.data('id');
       let name = $t.parent().parent().find(".pname").text();
       let price = $t.parent().parent().find(".pprice").text();
       let image = $t.parent().parent().find(".pimage").attr("src");
       // alert(name+"("+price+")"+image);
       cart.addItem({id: id,name: name,price: price,image: image});
    //    alert("item "+ name +" added");
       Swal.fire(
          name,
          "item "+ name +" added",
          'success'
       );
       $("#cardLength").html(cart.totalItems());
    });
 });